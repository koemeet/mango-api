<?php
/**
 * Created by PhpStorm.
 * User: Robinskoe
 * Date: 08/04/14
 * Time: 12:34
 */

namespace Mango\CoreDomain\Repository;
use Mango\CoreDomain\Model\Company;

/**
 * Class CompanyRepositoryInterface
 * @package Mango\CoreDomain\Repository
 */
interface CompanyRepositoryInterface extends GenericRepositoryInterface
{
    /**
     * Create a company object.
     *
     * @return Company
     */
    public function createCompany();

    /**
     * Add a company.
     *
     * @param $company
     * @return mixed
     */
    public function add($company);
}