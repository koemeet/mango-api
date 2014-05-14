<?php
/**
 * Created by PhpStorm.
 * User: Robinskoe
 * Date: 02/04/14
 * Time: 00:08
 */

namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomain\Model\Company;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\CompanyRepositoryInterface;

/**
 * Class CompanyRepository
 *
 * Repository for Company domain objects. It will only handle root aggregates.
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class CompanyRepository extends EntityRepository implements CompanyRepositoryInterface
{
    protected $class = 'MangoCoreDomain:Company';

    /**
     * Create a company object.
     *
     * @return Company
     */
    public function createCompany()
    {
        return new Company();
    }

    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->em->getRepository($this->class)->find($id);
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
        return $this->getQueryBuilder($this->class, $query)->getQuery()->getResult();
    }

    /**
     * Add a company.
     *
     * @param $company
     * @return mixed
     */
    public function add($company)
    {
        $this->em->persist($company);
        $this->em->flush($company);
    }
} 