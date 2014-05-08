<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 22:38
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\ORM\EntityManager;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\ObjectRepository;
use Mango\CoreDomainBundle\ORM\Result\PaginatedResult;

/**
 * Class EntityRepository
 * @package Mango\CoreDomainBundle\Repository
 */
abstract class EntityRepository implements ObjectRepository
{
    protected $em;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return $this->em->find($this->class, $id);
    }

    /**
     * {@inheritdoc}
     */
    public function findByQuery(Query $query)
    {
        $wrapper = new PaginatedResult($this->getQueryBuilder($this->class, $query));
        return $wrapper;
    }

    /**
     * Get QueryBuilder of Doctrine. If you pass in a Query object, it will parse it and preload it in the returned
     * QueryBuilder object.
     *
     * @param $entity
     * @param \Mango\CoreDomain\Persistence\Query $query
     * @param string $alias
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder($entity, Query $query = null, $alias = 't')
    {
        $qb = $this->em->getRepository($entity)->createQueryBuilder('t');

        if ($query !== null) {
            foreach ($query->getOrderBy() as $field => $order) {
                $qb->addOrderBy(sprintf("t.%s", $field), $order);
            }

            $qb->setMaxResults($query->getLimit());
            $qb->setFirstResult($query->getOffset());
        }

        return $qb;
    }
} 