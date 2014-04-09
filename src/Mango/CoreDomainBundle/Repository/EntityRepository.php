<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 22:38
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\ORM\EntityManager;
use Mango\CoreDomain\Persistence\Query;

/**
 * Class EntityRepository
 * @package Mango\CoreDomainBundle\Repository
 */
abstract class EntityRepository
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