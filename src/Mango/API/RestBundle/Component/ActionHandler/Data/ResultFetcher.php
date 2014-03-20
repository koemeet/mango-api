<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 23:03
 */

namespace Mango\API\RestBundle\Component\ActionHandler\Data;

use Doctrine\ORM\EntityManager;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;

/**
 * Class ResultFetcher
 * @package Mango\API\RestBundle\Component\ActionHandler\Data
 */
class ResultFetcher
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * Constructor.
     *
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->em = $entityManager;
    }

    /**
     * Find a collection of records based on the given Query object.
     *
     * @param $entity
     * @param Query $query
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function find($entity, Query $query)
    {
        $qb = $this->em->getRepository($entity)->createQueryBuilder('t');

        // Sort results
        foreach ($query->getOrderBy() as $v) {
            $qb->addOrderBy(sprintf("%s.%s", 't', $v['field']), $v['order']);
        }

        // Pagination support
        $firstResult = ($query->getPage() - 1) * $query->getLimit();
        $qb->setFirstResult($firstResult);
        $qb->setMaxResults($query->getLimit());

        return $qb;
    }

    /**
     * @param $entity
     * @param $identifier
     * @return mixed
     */
    public function findOne($entity, $identifier)
    {
        $qb = $this->em->getRepository($entity)->createQueryBuilder('t');

        if (is_array($identifier)) {
            foreach ($identifier as $field => $value) {
                $qb->andWhere(sprintf("%s.%s = :identifier", 't', $field))->setParameter('identifier', $value);
            }
        } else {
            $qb->andWhere(sprintf("%s.%s = :identifier", 't', 'id'))->setParameter('identifier', $identifier);
        }

        $qb->setMaxResults(1);

        return $qb->getQuery()->getOneOrNullResult();
    }
} 