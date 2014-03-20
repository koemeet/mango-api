<?php

/*
 * This file is part of the Symfony CMF package.
 *
 * (c) 2011-2013 Symfony CMF
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Symfony\Cmf\Bundle\MenuBundle\Tests\Unit\Model;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;

class MenuNodeTest extends \PHPUnit_Framework_Testcase
{
    public function setUp()
    {
        $c1 = new MenuNode;
        $c1->setLabel('Child 1');
        $c2 = new MenuNode;
        $c2->setLabel('Child 2');
        $this->content = new \StdClass;
        $this->parentNode = new MenuNode;
        $this->node = new MenuNode;
        $this->node->setId('/foo/bar')
            ->setParent($this->parentNode)
            ->setName('test')
            ->setLabel('Test')
            ->setUri('http://www.example.com')
            ->setRoute('test_route')
            ->setContent($this->content)
            ->setAttributes(array('foo' => 'bar'))
            ->setChildrenAttributes(array('bar' => 'foo'))
            ->setExtras(array('far' => 'boo'))
            ->setLinkAttributes(array('link' => 'knil'))
            ->setLabelAttributes(array('label' => 'lebal'))
            ->setDisplay(false)
            ->setDisplayChildren(false)
            ->setRouteAbsolute(true)
            ->setLinkType('linktype');
    }

    public function testGetters()
    {
        $this->assertSame($this->parentNode, $this->node->getParent());
        $this->assertEquals('test', $this->node->getName());
        $this->assertEquals('Test', $this->node->getLabel());
        $this->assertEquals('http://www.example.com', $this->node->getUri());
        $this->assertEquals('test_route', $this->node->getRoute());
        $this->assertSame($this->content, $this->node->getContent());
        $this->assertEquals(array('foo' => 'bar'), $this->node->getAttributes());
        $this->assertEquals('bar', $this->node->getAttribute('foo'));
        $this->assertEquals(array('bar' => 'foo'), $this->node->getChildrenAttributes());
        $this->assertEquals(array('far' => 'boo'), $this->node->getExtras());

        $this->parentNode = new MenuNode;
        $this->node->setPosition($this->parentNode, 'FOOO');
        $this->assertSame($this->parentNode, $this->node->getParent());
        $this->assertEquals('FOOO', $this->node->getName());
        $this->assertEquals(array('link' => 'knil'), $this->node->getLinkAttributes());
        $this->assertEquals(array('label' => 'lebal'), $this->node->getLabelAttributes());
        $this->assertFalse($this->node->getDisplay());
        $this->assertFalse($this->node->getDisplayChildren());
        $this->assertTrue($this->node->getRouteAbsolute());
        $this->assertEquals('linktype', $this->node->getLinkType());
    }

    public function testAddChild()
    {
        $c1 = new MenuNode;
        $c2 = new MenuNode;
        $m = new MenuNode;
        $m->addChild($c1);
        $ret = $m->addChild($c2);

        $children = $m->getChildren();
        $this->assertCount(2, $children);
        $this->assertSame($m, $children[0]->getParent());
        $this->assertSame($c2, $ret);
    }

    public function testMultilang()
    {
        $n = new MenuNode;
        $n->setLocale('fr');
        $this->assertEquals('fr', $n->getLocale());
    }

    public function testPublishTimePeriodInterface()
    {
        $startDate = new \DateTime('2013-01-01');
        $endDate = new \DateTime('2013-02-01');

        $n = new MenuNode;

        $this->assertInstanceOf(
            'Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishTimePeriodInterface',
            $n
        );

        // test defaults
        $this->assertTrue($n->isPublishable());
        $this->assertNull($n->getPublishStartDate());
        $this->assertNull($n->getPublishEndDate());

        $n->setPublishable(false);
        $n->setPublishStartDate($startDate);
        $n->setPublishEndDate($endDate);

        $this->assertSame($startDate, $n->getPublishStartDate());
        $this->assertSame($endDate, $n->getPublishEndDate());
    }

    /**
     * @depends testGetters
     */
    public function testGetOptions()
    {
        $this->assertEquals(array(
            'uri' => $this->node->getUri(),
            'route' => $this->node->getRoute(),
            'label' => $this->node->getLabel(),
            'attributes' => $this->node->getAttributes(),
            'childrenAttributes' => $this->node->getChildrenAttributes(),
            'display' => $this->node->getDisplay(),
            'displayChildren' => $this->node->getDisplayChildren(),
            'content' => $this->node->getContent(),
            'routeParameters' => $this->node->getRouteParameters(),
            'routeAbsolute' => $this->node->getRouteAbsolute(),
            'linkAttributes' => $this->node->getLinkAttributes(),
            'labelAttributes' => $this->node->getLabelAttributes(),
            'linkType' => $this->node->getLinkType(),
        ), $this->node->getOptions());
    }
}
