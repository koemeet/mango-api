<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 22:38
 */

namespace Mango\CoreDomainBundle\Repository;

use Doctrine\ORM\EntityManager;

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
     * @param null $query
     * @param string $alias
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getQueryBuilder($entity, $query = null, $alias = 't')
    {
        $qb = $this->em->getRepository($entity)->createQueryBuilder('t');
        return $qb;
    }
} 