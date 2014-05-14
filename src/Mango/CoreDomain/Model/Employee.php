<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 14/05/14
 * Time: 11:40
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Employee
 *
 * @package Mango\CoreDomain\Model
 */
class Employee extends Person
{
    /**
     * @var string
     */
    protected $id;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var User
     */
    protected $user;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}