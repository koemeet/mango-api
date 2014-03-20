<?php

namespace Jackalope\Transport\DoctrineDBAL;

use Doctrine\DBAL\Platforms\SqlitePlatform;
use Jackalope\Test\TestCase;
use PHPCR\Util\NodeHelper;

class ClientTest extends TestCase
{
    private $transport;
    /**
     * @var \Jackalope\Repository
     */
    private $repository;
    /**
     * @var \Jackalope\Session
     */
    private $session;

    public function setUp()
    {
        parent::setUp();

        $conn = $this->getConnection();
        $options = array('disable_fks' => $conn->getDatabasePlatform() instanceof SqlitePlatform);
        $schema = new RepositorySchema($options, $conn);
        // do not use reset as we want to ignore exceptions on drop
        foreach ($schema->toDropSql($conn->getDatabasePlatform()) as $statement) {
            try {
                $conn->exec($statement);
            } catch (\Exception $e) {
                // ignore
            }
        }

        foreach ($schema->toSql($conn->getDatabasePlatform()) as $statement) {
            $conn->exec($statement);
        }

        $this->transport = new \Jackalope\Transport\DoctrineDBAL\Client(new \Jackalope\Factory(), $conn);
        $this->transport->createWorkspace('default');

        $this->repository = new \Jackalope\Repository(null, $this->transport);

        try {
            $this->transport->createWorkspace($GLOBALS['phpcr.workspace']);
        } catch (\PHPCR\RepositoryException $e) {
            if ($e->getMessage() != "Workspace '".$GLOBALS['phpcr.workspace']."' already exists") {
                // if the message is not that the workspace already exists, something went really wrong
                throw $e;
            }
        }
        $this->session = $this->repository->login(new \PHPCR\SimpleCredentials("user", "passwd"), $GLOBALS['phpcr.workspace']);
    }

    public function testQueryNodes()
    {
        $root = $this->session->getNode('/');
        $article = $root->addNode('article');
        $article->setProperty('foo', 'bar');
        $article->setProperty('bar', 'baz');

        $this->session->save();

        $qm = $this->session->getWorkspace()->getQueryManager();
        $query = $qm->createQuery('SELECT * FROM [nt:unstructured]', \PHPCR\Query\QueryInterface::JCR_SQL2);
        $result = $query->execute();

        $this->assertEquals(2, count($result->getNodes()));

        $query = $qm->createQuery('SELECT * FROM [nt:unstructured] WHERE foo = "bar"', \PHPCR\Query\QueryInterface::JCR_SQL2);
        $result = $query->execute();

        $this->assertEquals(1, count($result->getNodes()));
    }

    public function testAddNodeTypes()
    {
        $workspace = $this->session->getWorkspace();
        $ntm = $workspace->getNodeTypeManager();
        $template = $ntm->createNodeTypeTemplate();
        $template->setName('phpcr:article');

        $propertyDefs = $template->getPropertyDefinitionTemplates();
        $propertyTemplate = $ntm->createPropertyDefinitionTemplate();
        $propertyTemplate->setName('headline');
        $propertyTemplate->setRequiredType(\PHPCR\PropertyType::STRING);
        $propertyDefs[] = $propertyTemplate;

        $childDefs = $template->getNodeDefinitionTemplates();
        $nodeTemplate = $ntm->createNodeDefinitionTemplate();
        $nodeTemplate->setName('article_content');
        $nodeTemplate->setDefaultPrimaryTypeName('nt:unstructured');
        $nodeTemplate->setMandatory(true);
        $childDefs[] = $nodeTemplate;

        $ntm->registerNodeTypes(array($template), true);

        $def = $ntm->getNodeType('phpcr:article');
        $this->assertEquals("phpcr:article", $def->getName());
        $this->assertEquals(1, count($def->getDeclaredPropertyDefinitions()));
        $this->assertEquals(1, count($def->getDeclaredChildNodeDefinitions()));
    }

    public function testReorderNodes()
    {
        $root = $this->session->getNode('/');
        $topic = $root->addNode('topic');
        $topic->addNode('page1');
        $topic->addNode('page2');
        $topic->addNode('page3');
        $topic->addNode('page4');
        $topic->addNode('page5');

        $this->session->save();

        $topic->orderBefore('page3', 'page1');
        $topic->orderBefore('page4', NULL);

        $this->session->save();

        $conn = $this->getConnection();
        $qb = $conn->createQueryBuilder();

        $qb->select('local_name, sort_order')
            ->from('phpcr_nodes', 'n')
            ->where('n.local_name = :name')
            ->andWhere('n.parent = :parent')
            ->orderBy('n.sort_order', 'ASC');

        $query = $qb->getSql();

        $stmnt = $this->conn->executeQuery($query, array('name' => 'page3', 'parent' => '/topic'));
        $row = $stmnt->fetch();
        $this->assertEquals(0, $row['sort_order']);

        $stmnt = $this->conn->executeQuery($query, array('name' => 'page4', 'parent' => '/topic'));

        $row = $stmnt->fetch();
        $this->assertEquals(4, $row['sort_order']);

        $retrieved = $this->session->getNode('/topic');
        foreach ($retrieved as $name => $child) {
            $check[] = $name;
        }

        $this->assertEquals($check[0], 'page3');
        $this->assertEquals($check[4], 'page4');
    }

    /**
     * Test cases for depth set when adding nodes
     */
    public function testDepthOnAdd()
    {
        $root = $this->session->getNode('/');
        $topic = $root->addNode('topic');
        $topic->addNode('page1');

        $this->session->save();

        $conn = $this->getConnection();
        $qb = $conn->createQueryBuilder();

        $qb->select('local_name, depth')
            ->from('phpcr_nodes', 'n')
            ->where('n.path = :path');

        $query = $qb->getSql();

        $stmnt = $this->conn->executeQuery($query, array('path' => '/topic'));
        $row = $stmnt->fetch();

        $this->assertEquals($row['depth'], '1');

        $stmnt = $this->conn->executeQuery($query, array('path' => '/topic/page1'));
        $row = $stmnt->fetch();

        $this->assertEquals($row['depth'], '2');
    }

    /**
     * Test cases for depth when moving nodes
     */
    public function testDepthOnMove()
    {
        $root = $this->session->getNode('/');
        $topic1 = $root->addNode('topic1');
        $topic2 = $root->addNode('topic2');
        $topic3 = $root->addNode('topic3');

        $topic1->addNode('page1');
        $topic2->addNode('page2');
        $topic3->addNode('page3');
        $this->session->save();

        $this->transport->moveNodeImmediately('/topic2/page2', '/topic1/page1/page2');

        $this->transport->moveNodeImmediately('/topic3', '/topic1/page1/page2/topic3');

        $conn = $this->getConnection();
        $qb = $conn->createQueryBuilder();

        $qb->select('local_name, depth')
            ->from('phpcr_nodes', 'n')
            ->where('n.path = :path');

        $query = $qb->getSql();

        $stmnt = $this->conn->executeQuery($query, array('path' => '/topic1/page1/page2'));
        $row = $stmnt->fetch();
        $this->assertEquals($row['depth'], '3');

        $stmnt = $this->conn->executeQuery($query, array('path' => '/topic1/page1/page2/topic3/page3'));
        $row = $stmnt->fetch();
        $this->assertEquals($row['depth'], '5');
    }

    /**
     * @dataProvider provideTestOutOfRangeCharacters
     */
    public function testOutOfRangeCharacterOccurrence($string, $isValid)
    {
        if (false === $isValid) {
            $this->setExpectedException('PHPCR\ValueFormatException', 'Invalid character found in property "test". Are you passing a valid string?');
        }

        $root = $this->session->getNode('/');
        $article = $root->addNode('article');
        $article->setProperty('test', $string);
        $this->session->save();
    }

    public function provideTestOutOfRangeCharacters()
    {
        return array(
            array('This is valid too!'.$this->translateCharFromCode('\u0009'), true),
            array('This is valid', true),
            array($this->translateCharFromCode('\uD7FF'), true),
            array('This is on the edge, but valid too.'. $this->translateCharFromCode('\uFFFD'), true),
            array($this->translateCharFromCode('\u10000'), true),
            array($this->translateCharFromCode('\u10FFFF'), true),
            array($this->translateCharFromCode('\u0001'), false),
            array($this->translateCharFromCode('\u0002'), false),
            array($this->translateCharFromCode('\u0003'), false),
            array($this->translateCharFromCode('\u0008'), false),
            array($this->translateCharFromCode('\uFFFF'), false),
        );
    }

    private function translateCharFromCode($char)
    {
        return json_decode('"'.$char.'"');
    }

    public function testDeleteMoreThanOneThousandNodes()
    {
        $session = $this->session;
        $nodes = array();
        $root = $this->session->getNode('/');
        $parent = $root->addNode('test-more-than-one-thousand');

        for ($i = 0; $i <= 1200; $i++) {
            $nodes[] = $parent->addNode('node-'.$i);
        }

        $this->session->save();

        NodeHelper::purgeWorkspace($this->session);

        $this->session->save();
    }
}
