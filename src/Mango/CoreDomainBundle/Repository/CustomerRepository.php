<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 00:08
 */

namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\CustomerRepositoryInterface;

/**
 * Class CustomerRepository
 *
 * Repository for Customer domain objects. It will only handle root aggregates.
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class CustomerRepository extends EntityRepository implements CustomerRepositoryInterface
{
    protected $class = 'MangoCoreDomain:Customer';

    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        $this->em->getRepository($this->class)->find($id);
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
        return $this->findBy(array(), $limit, $offset);
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
        $qb = $this->em->getRepository($this->class)->createQueryBuilder('t');

        foreach ($criteria as $field => $value) {
            $param = uniqid();
            $qb->andWhere(sprintf("t.%s = :%s", $field, $param))->setParameter($param, $value);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return mixed
     */
    public function findByQuery(Query $query)
    {
        // TODO: Implement findByQuery() method.
    }
}