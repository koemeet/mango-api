<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 16:43
 */

namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;

/**
 * Class ApplicationRepository
 *
 * Provides functionality to add, update or remove applications. Also you can query this repository
 * to find specific applications.
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class ApplicationRepository extends EntityRepository implements ApplicationRepositoryInterface
{
    protected $class = 'MangoCoreDomain:Application';

    /**
     * Add an Application.
     *
     * @param Application $application
     * @return bool
     */
    public function add(Application $application)
    {
        $this->em->persist($application);
        $this->em->flush();
    }

    /**
     * Removes the given Application.
     *
     * @param Application $application
     * @return bool
     */
    public function remove(Application $application)
    {
        $this->em->remove($application);
        $this->em->flush();
    }

    /**
     * @param $id
     * @return object
     */
    public function find($id)
    {
        return $this->em->getRepository($this->class)->find($id);
    }

    /**
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0)
    {
        $qb = $this->getQueryBuilder($this->class);
        $qb->setMaxResults($limit);
        $qb->setFirstResult($offset);

        foreach ($criteria as $field => $value) {
            $param = $field;
            $qb->andWhere(sprintf('t.%s = :%s', $field, $param))->setParameter($param, $value);
        }

        return $qb->getQuery()->getResult();
    }

    /**
     * Find records by query
     *
     * @param $query
     * @return mixed
     */
    public function findByQuery($query)
    {
        return $this->getQueryBuilder($this->class, $query);
    }


    /**
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0)
    {
        return $this->findBy(array(), $limit, $offset);
    }
} 