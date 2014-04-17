<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 16:58
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\Common\Collections\ArrayCollection;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomainBundle\Document\Image;
use Mango\CoreDomainBundle\Document\Page;
use PHPCR\Util\NodeHelper;

/**
 * Class PageRepository
 * @package Mango\CoreDomainBundle\Repository
 */
class PageRepository extends DocumentRepository implements PageRepositoryInterface
{
    protected $rootPath = '/applications';


    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->dm->find(null, 'd1b73235-261f-4fbb-84fd-614948ea4924');
    }

    /**
     * Find all records.
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0)
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Find records by certain criteria.
     *
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0)
    {
        // TODO: Implement findBy() method.
    }

    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return mixed
     */
    public function findByQuery(Query $query)
    {
        $pages = $this->dm->getRepository('Mango\CoreDomainBundle\Document\Page')->findAll()->toArray();
        return $this->normalizeArray($pages);
    }

    /**
     * Create a Page instance.
     *
     * @return Page
     */
    public function createPage()
    {
        return new Page();
    }

    /**
     * Add page.
     *
     * @param \Mango\CoreDomain\Model\Application $page
     * @throws \Exception
     * @return void
     */
    public function add($page)
    {
        if (!$page instanceof Page) {
            throw new \Exception("G, doe normaal, geef mij die page document.");
        }

        $parent = $this->dm->find(null, $this->rootPath . '/' . $page->getApplication()->getId() . '/content');
        $page->setParent($parent);

        NodeHelper::createPath($this->dm->getPhpcrSession(), $this->rootPath . '/'  . $page->getApplication()->getId() . '/images');

        $url = 'http://upload.wikimedia.org/wikipedia/commons/1/18/My_Son.jpg';
        $image = new Image();
        $image->setParent($this->dm->find(null, $this->rootPath . '/'  . $page->getApplication()->getId() . '/images'));
        $image->setName('my-image-4');
        $image->setContent(fopen($url, "r"));

        $this->dm->persist($image);

        $page->setImage($image);



        // Doei, we zetten deze in zijn parent path towk
        $page->setApplication(null);

        $this->dm->persist($page);
        $this->dm->flush();
    }

    /**
     * @param $data
     * @return array
     * @throws \InvalidArgumentException
     */
    private function normalizeArray($data)
    {
        if ($data instanceof ArrayCollection) {
            $data = $data->toArray();
        }

        if (!is_array($data)) {
            throw new \InvalidArgumentException('$data needs to be an array.');
        }

        sort($data);
        return $data;
    }
}