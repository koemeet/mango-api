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
    /*
     * @var Customer
     */
    protected $customer;

    /**
     * @var Application[]
     */
    protected $applications;

    /**
     * @var Workspace[]
     */
    protected $workspaces;

    protected $firstName;

    protected $inbetweener;

    protected $middleName;

    protected $lastName;

    protected $phonePrimair;

    protected $phoneSecundair;

    protected $streetAddress;

    protected $streetNumber;

    protected $streetNumberSuffix;

    protected $city;

    protected $zipcode;

    protected $country;

    protected $billingStreetAddress;

    protected $billingStreetNumber;

    protected $billingStreetNumberSuffix;

    protected $billingCity;

    protected $billingZipcode;

    protected $billingCountry;

    protected $marketingMails;

    protected $notes;


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

    /**
     * @param Workspace[] $workspaces
     */
    public function setWorkspaces($workspaces)
    {
        $this->workspaces = $workspaces;
    }

    /**
     * @return Workspace[]
     */
    public function getWorkspaces()
    {
        return $this->workspaces;
    }

    /**
     * @param mixed $billingCity
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;
    }

    /**
     * @return mixed
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * @param mixed $billingCountry
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;
    }

    /**
     * @return mixed
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * @param mixed $billingStreetAddress
     */
    public function setBillingStreetAddress($billingStreetAddress)
    {
        $this->billingStreetAddress = $billingStreetAddress;
    }

    /**
     * @return mixed
     */
    public function getBillingStreetAddress()
    {
        return $this->billingStreetAddress;
    }

    /**
     * @param mixed $billingStreetNumber
     */
    public function setBillingStreetNumber($billingStreetNumber)
    {
        $this->billingStreetNumber = $billingStreetNumber;
    }

    /**
     * @return mixed
     */
    public function getBillingStreetNumber()
    {
        return $this->billingStreetNumber;
    }

    /**
     * @param mixed $billingStreetNumberSuffix
     */
    public function setBillingStreetNumberSuffix($billingStreetNumberSuffix)
    {
        $this->billingStreetNumberSuffix = $billingStreetNumberSuffix;
    }

    /**
     * @return mixed
     */
    public function getBillingStreetNumberSuffix()
    {
        return $this->billingStreetNumberSuffix;
    }

    /**
     * @param mixed $billingZipcode
     */
    public function setBillingZipcode($billingZipcode)
    {
        $this->billingZipcode = $billingZipcode;
    }

    /**
     * @return mixed
     */
    public function getBillingZipcode()
    {
        return $this->billingZipcode;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $inbetweener
     */
    public function setInbetweener($inbetweener)
    {
        $this->inbetweener = $inbetweener;
    }

    /**
     * @return mixed
     */
    public function getInbetweener()
    {
        return $this->inbetweener;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $marketingMails
     */
    public function setMarketingMails($marketingMails)
    {
        $this->marketingMails = $marketingMails;
    }

    /**
     * @return mixed
     */
    public function getMarketingMails()
    {
        return $this->marketingMails;
    }

    /**
     * @param mixed $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $phonePrimair
     */
    public function setPhonePrimair($phonePrimair)
    {
        $this->phonePrimair = $phonePrimair;
    }

    /**
     * @return mixed
     */
    public function getPhonePrimair()
    {
        return $this->phonePrimair;
    }

    /**
     * @param mixed $phoneSecundair
     */
    public function setPhoneSecundair($phoneSecundair)
    {
        $this->phoneSecundair = $phoneSecundair;
    }

    /**
     * @return mixed
     */
    public function getPhoneSecundair()
    {
        return $this->phoneSecundair;
    }

    /**
     * @param mixed $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return mixed
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param mixed $streetNumber
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;
    }

    /**
     * @return mixed
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * @param mixed $streetNumberSuffix
     */
    public function setStreetNumberSuffix($streetNumberSuffix)
    {
        $this->streetNumberSuffix = $streetNumberSuffix;
    }

    /**
     * @return mixed
     */
    public function getStreetNumberSuffix()
    {
        return $this->streetNumberSuffix;
    }

    /**
     * @param mixed $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return mixed
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }


}