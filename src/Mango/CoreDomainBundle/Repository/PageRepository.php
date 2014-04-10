<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 16:58
 */

namespace Mango\CoreDomainBundle\Repository;


use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomainBundle\Document\Page;

/**
 * Class PageRepository
 * @package Mango\CoreDomainBundle\Repository
 */
class PageRepository extends DocumentRepository implements PageRepositoryInterface
{
    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
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
        return $this->dm->getRepository('Mango\CoreDomainBundle\Document\Page')->findAll();
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
     * @param $page
     * @return void
     * @throws \Exception
     */
    public function add($page)
    {
        if (!$page instanceof Page) {
            throw new \Exception("G, doe normaal, geef mij die page document.");
        }

        $parent = $this->dm->find(null, '/cms/content');
        $page->setParent($parent);

        $this->dm->persist($page);
        $this->dm->flush();
    }
}