<?php
namespace Mango\CoreDomain\Repository;

use Mango\CoreDomain\Model\Company;
use Mango\CoreDomain\Model\Employee;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface EmployeeRepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface EmployeeRepositoryInterface extends RepositoryInterface
{
    /**
     * @return Employee
     */
    public function createEmployee();

    /**
     * Add employee.
     *
     * @param Employee $employee
     */
    public function add($employee);

    /**
     * Find employees by company.
     *
     * @param Company $company
     * @param Query   $query
     * @return Employee[]
     */
    public function findByCompany(Company $company, Query $query = null);
}