<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 14/05/14
 * Time: 12:08
 */

namespace Mango\CoreDomainBundle\Repository;

use Mango\CoreDomain\Model\Company;
use Mango\CoreDomain\Model\Employee;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\EmployeeRepositoryInterface;

/**
 * Class EmployeeRepository
 *
 * @package Mango\CoreDomainBundle\Repository
 */
class EmployeeRepository extends EntityRepository implements EmployeeRepositoryInterface
{
    protected $class = 'Mango\CoreDomain\Model\Employee';

    /**
     * @return Employee
     */
    public function createEmployee()
    {
        return new Employee();
    }

    /**
     * Add employee.
     *
     * @param Employee $employee
     */
    public function add($employee)
    {
        $this->em->persist($employee);
        $this->em->flush($employee);
    }

    /**
     * Find employees by company.
     *
     * @param Company $company
     * @param Query   $query
     * @return Employee[]
     */
    public function findByCompany(Company $company, Query $query = null)
    {
        $qb = $this->getQueryBuilder($this->class, $query);
        $qb->andWhere('t.company = :company')->setParameter('company', $company);
        return $qb->getQuery()->getResult();
    }

    /**
     * Get the object id of the given model.
     *
     * @param $model
     * @return mixed
     */
    public function getModelIdentifier($model)
    {
        return $this->em->getUnitOfWork()->getEntityIdentifier($model);
    }

    /**
     * Find all objects.
     *
     * @return mixed
     */
    public function findAll()
    {
        return $this->em->getRepository($this->class)->findAll();
    }
} 