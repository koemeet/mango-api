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
    protected $customer;

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

    public function slugify($slug)
    {
        return strtolower($slug);
    }
}