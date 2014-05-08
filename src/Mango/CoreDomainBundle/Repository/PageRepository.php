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
use Mango\CoreDomain\Model\Page as PageModel;
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
        return $this->dm->getRepository('Mango\CoreDomainBundle\Document\Page')->find($id);
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
        $pages = $this->dm->getRepository('Mango\CoreDomainBundle\Document\Page')->findAll()->toArray();
        return $this->normalizeArray($pages);
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
        $qb = $this->dm->getRepository('Mango\CoreDomainBundle\Document\Page')->createQueryBuilder('page');
        $qb->where()->descendant('/applications/f1cd0360-d11c-11e3-89b3-a8b38a9a6428', 'page');

        print_r($qb->getQuery()->execute());
        die;
        return $this->normalizeArray($pages);
    }

    /**
     * Find all pages for an application.
     *
     * @param Application $application
     * @param Query $query
     * @return mixed
     */
    public function findByApplication(Application $application, Query $query = null)
    {
        $qb = $this->dm->getRepository('Mango\CoreDomainBundle\Document\Page')->createQueryBuilder('page');
        $qb->where()->descendant('/applications/' . $application->getId(), 'page');

        $pages = $qb->getQuery()->execute();

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

        $rootPath = $this->rootPath . '/' . $page->getApplication()->getId() . '/content';

        $session = $this->dm->getPhpcrSession();
        NodeHelper::createPath($session, $rootPath);
        $session->save();

        $parent = $this->dm->find(null, $rootPath);
        $page->setParent($parent);

//        NodeHelper::createPath($this->dm->getPhpcrSession(), $this->rootPath . '/'  . $page->getApplication()->getId() . '/images');
//
//        $url = 'http://upload.wikimedia.org/wikipedia/commons/1/18/My_Son.jpg';
//        $image = new Image();
//        $image->setParent($this->dm->find(null, $this->rootPath . '/'  . $page->getApplication()->getId() . '/images'));
//        $image->setName('my-image-4');
//        $image->setContent(fopen($url, "r"));
//
//        $this->dm->persist($image);
//
//        $page->setImage($image);

        // Doei, we zetten deze in zijn parent path towk
        $page->setApplication(null);

        $this->dm->persist($page);
        $this->dm->flush();
    }

    /**
     * Handle the update process of a page.
     *
     * @param \Mango\CoreDomain\Model\Page $page
     * @throws \Exception
     * @return mixed
     */
    public function update(PageModel $page)
    {
        if (!$page instanceof Page) {
            throw new \Exception('$page is not an instance of Mango\CoreDomainBundle\Document\Page.');
        }

        $this->dm->flush($page);
    }
}