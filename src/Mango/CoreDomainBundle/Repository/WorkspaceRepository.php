<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 11:16
 */

namespace Mango\CoreDomainBundle\Repository;


use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\WorkspaceRepositoryInterface;

class WorkspaceRepository extends EntityRepository implements WorkspaceRepositoryInterface
{
    protected $class = 'MangoCoreDomain:Workspace';

    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->em->find($this->class, $id);
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
        return $this->getQueryBuilder($this->class, $query)->getQuery()->getResult();
    }

} 