<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 29/03/14
 * Time: 21:33
 */

namespace Mango\CoreDomain\Model;

use FOS\UserBundle\Model\User as BaseUser;

/**
 * Class User
 * @package Mango\CoreDomain\Model
 */
class User extends BaseUser
{
    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var Application[]
     */
    protected $applications;

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Application[] $applications
     */
    public function setApplications($applications)
    {
        $this->applications = $applications;
    }

    /**
     * Add an application to the user
     *
     * @param Application $application
     */
    public function addApplication(Application $application)
    {
        $this->applications[] = $application;
    }

    /**
     * Remove a single application from a user.
     *
     * @param Application $application
     */
    public function removeApplication(Application $application)
    {
        if (($key = array_search($application, $this->applications)) !== false) {
            unset($this->applications[$key]);
        }
    }

    /**
     * @return Application[]
     */
    public function getApplications()
    {
        return $this->applications;
    }
}