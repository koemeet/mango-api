<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 21:16
 */

namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomain\Data\PaginatedResult;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomainBundle\Document\Category;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\CategoryRepositoryInterface;
use PHPCR\Util\NodeHelper;

/**
 * Class CategoryRepository
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class CategoryRepository extends DocumentRepository implements CategoryRepositoryInterface
{
    protected $class = 'Mango\CoreDomainBundle\Document\Category';

    /**
     * Create a new category object.
     *
     * @return Category
     */
    public function createCategory()
    {
        return new Category();
    }

    /**
     * Get the object id of the given model.
     *
     * @param $model
     * @return mixed
     */
    public function getModelIdentifier($model)
    {
        return $this->dm->getUnitOfWork()->getDocumentId($model);
    }


    /**
     * Add category.
     *
     * @param $category
     * @throws \InvalidArgumentException
     */
    public function add($category)
    {
        if (!$category instanceof Category) {
            throw new \InvalidArgumentException(sprintf("First argument of type %s is not expected", get_class($category)));
        }

        $parentPath = '/applications/' . $category->getApplication()->getId() . '/categories';

        $session = $this->dm->getPhpcrSession();
        NodeHelper::createPath($session, $parentPath);
        $session->save();

        $parent = $this->dm->find(null, $parentPath);
        $category->setPhpcrParent($parent);

        $this->dm->persist($category);
        $this->dm->flush($category);
    }

    /**
     * Find category by id.
     *
     * @param $id
     * @return Category
     */
    public function find($id)
    {
        return $this->dm->find($this->class, $id);
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
        $categories = $this->dm->getRepository($this->class)->findAll();
        return $this->normalizeArray($categories);
    }

    /**
     * Find records by certain criteria.
     *
     * @param array $criteria
     * @param int   $limit
     * @param int   $offset
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
     * @return PaginatedResult
     */
    public function findByQuery(Query $query)
    {
        // TODO: Implement findByQuery() method.
    }

    /**
     * Find categories by application.
     *
     * @param Application $application
     * @param Query       $query
     * @return mixed
     */
    public function findByApplication(Application $application, Query $query = null)
    {
        $categories = $this->getQueryBuilder($application)->getQuery()->execute();
        return $this->normalizeArray($categories);
    }

    /**
     * @param Application $application
     * @return \Doctrine\ODM\PHPCR\Query\Builder\QueryBuilder
     */
    protected function getQueryBuilder(Application $application = null)
    {
        $qb = $this->dm->getRepository($this->class)->createQueryBuilder('category');

        if (null !== $application) {
            $parentPath = '/applications/' . $application->getId() . '/categories';
            $qb->where()->descendant($parentPath, 'category');
        }

        return $qb;
    }
} 