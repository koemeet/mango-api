<?php

namespace Mango\API\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * Users
 *
 * @Serializer\XmlRoot("user")
 * @Hateoas\Relation(
 *      "self",
 *      href = @Hateoas\Route("get_user", parameters = {"id" = "expr(object.getId())"}, absolute = true)
 * )
 * @Hateoas\Relation(
 *  "new", href = @Hateoas\Route("new_users", absolute = true)
 * )
 * @Hateoas\Relation(
 *      "customer",
 *      href = @Hateoas\Route("get_customer", parameters = {"id" = "expr(object.getCustomer().getId())"}, absolute = true),
 *      embedded = @Hateoas\Embedded(
 *          "expr(object.getCustomer())",
 *          exclusion = @Hateoas\Exclusion(excludeIf = "expr(true)")
 *      ),
 *      exclusion = @Hateoas\Exclusion(excludeIf = "expr(object.getCustomer() == null)")
 * )
 * @ORM\Table(name="users", indexes={@ORM\Index(name="fk_users_customers_idx", columns={"customer_id"})})
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var string
     *
     * @Serializer\XmlAttribute
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="users", cascade={"remove"})
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="customer_id", referencedColumnName="id", nullable=false)
     * })
     */
    protected $customer;


    /**
     * @ORM\Column(name="first_name", type="string", nullable=true)
     */
    protected $firstname;

    /**
     * @ORM\Column(name="inbetweener", type="string", nullable=true)
     */
    protected $inbetweener;

    /**
     * @ORM\Column(name="middle_name", type="string", nullable=true)
     */
    protected $middleName;

    /**
     * @ORM\Column(name="last_name", type="string", nullable=true)
     */
    protected $lastName;

    /**
     * @ORM\Column(name="phone_primair", type="integer", nullable=true)
     */
    protected $phonePrimair;

    /**
     * @ORM\Column(name="phone_secundair", type="integer", nullable=true)
     */
    protected $phoneSecundair;

    // Address
    /**
     * @ORM\Column(name="street_address", type="string", nullable=true)
     */
    protected $streetAddress;

    /**
     * @ORM\Column(name="street_number", type="integer", nullable=true)
     */
    protected $streetNumber;

    /**
     * @ORM\Column(name="street_number_suffix", type="string", nullable=true)
     */
    protected $streetNumberSuffix;

    /**
     * @ORM\Column(name="city", type="string", nullable=true)
     */
    protected $city;

    /**
     * @ORM\Column(name="zipcode", type="string", nullable=true)
     */
    protected $zipcode;

    /**
     * @ORM\Column(name="country", type="string", nullable=true)
     */
    protected $country;

    /**
     * @ORM\Column(name="billing_street_address", type="string", nullable=true)
     */
    protected $billingStreetAddress;

    /**
     * @ORM\Column(name="billing_street_number", type="integer", nullable=true)
     */
    protected $billingStreetNumber;

    /**
     * @ORM\Column(name="billing_street_number_suffix", type="string", nullable=true)
     */
    protected $billingStreetNumberSuffix;

    /**
     * @ORM\Column(name="billing_city", type="string", nullable=true)
     */
    protected $billingCity;

    /**
     * @ORM\Column(name="billing_zipcode", type="string", nullable=true)
     */
    protected $billingZipcode;

    /**
     * @ORM\Column(name="billing_country", type="string", nullable=true)
     */
    protected $billingCountry;

    /**
     * @ORM\Column(name="marketing_mails", type="boolean", nullable=true)
     */
    protected $marketingMails;

    /**
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    protected $notes;

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * Set customer
     *
     * @param \Mango\ERP\ApiBundle\Entity\Customer $customer
     * @return User
     */
    public function setCustomer(Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return \Mango\ERP\ApiBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * Set firstname
     *
     * @param string $firstname
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string 
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set inbetweener
     *
     * @param string $inbetweener
     * @return User
     */
    public function setInbetweener($inbetweener)
    {
        $this->inbetweener = $inbetweener;

        return $this;
    }

    /**
     * Get inbetweener
     *
     * @return string 
     */
    public function getInbetweener()
    {
        return $this->inbetweener;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     * @return User
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;

        return $this;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set phonePrimair
     *
     * @param integer $phonePrimair
     * @return User
     */
    public function setPhonePrimair($phonePrimair)
    {
        $this->phonePrimair = $phonePrimair;

        return $this;
    }

    /**
     * Get phonePrimair
     *
     * @return integer 
     */
    public function getPhonePrimair()
    {
        return $this->phonePrimair;
    }

    /**
     * Set phoneSecundair
     *
     * @param integer $phoneSecundair
     * @return User
     */
    public function setPhoneSecundair($phoneSecundair)
    {
        $this->phoneSecundair = $phoneSecundair;

        return $this;
    }

    /**
     * Get phoneSecundair
     *
     * @return integer 
     */
    public function getPhoneSecundair()
    {
        return $this->phoneSecundair;
    }

    /**
     * Set streetAddress
     *
     * @param string $streetAddress
     * @return User
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;

        return $this;
    }

    /**
     * Get streetAddress
     *
     * @return string 
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * Set streetNumber
     *
     * @param integer $streetNumber
     * @return User
     */
    public function setStreetNumber($streetNumber)
    {
        $this->streetNumber = $streetNumber;

        return $this;
    }

    /**
     * Get streetNumber
     *
     * @return integer 
     */
    public function getStreetNumber()
    {
        return $this->streetNumber;
    }

    /**
     * Set streetNumberSuffix
     *
     * @param string $streetNumberSuffix
     * @return User
     */
    public function setStreetNumberSuffix($streetNumberSuffix)
    {
        $this->streetNumberSuffix = $streetNumberSuffix;

        return $this;
    }

    /**
     * Get streetNumberSuffix
     *
     * @return string 
     */
    public function getStreetNumberSuffix()
    {
        return $this->streetNumberSuffix;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set zipcode
     *
     * @param string $zipcode
     * @return User
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;

        return $this;
    }

    /**
     * Get zipcode
     *
     * @return string 
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set billingStreetAddress
     *
     * @param string $billingStreetAddress
     * @return User
     */
    public function setBillingStreetAddress($billingStreetAddress)
    {
        $this->billingStreetAddress = $billingStreetAddress;

        return $this;
    }

    /**
     * Get billingStreetAddress
     *
     * @return string 
     */
    public function getBillingStreetAddress()
    {
        return $this->billingStreetAddress;
    }

    /**
     * Set billingStreetNumber
     *
     * @param integer $billingStreetNumber
     * @return User
     */
    public function setBillingStreetNumber($billingStreetNumber)
    {
        $this->billingStreetNumber = $billingStreetNumber;

        return $this;
    }

    /**
     * Get billingStreetNumber
     *
     * @return integer 
     */
    public function getBillingStreetNumber()
    {
        return $this->billingStreetNumber;
    }

    /**
     * Set billingStreetNumberSuffix
     *
     * @param string $billingStreetNumberSuffix
     * @return User
     */
    public function setBillingStreetNumberSuffix($billingStreetNumberSuffix)
    {
        $this->billingStreetNumberSuffix = $billingStreetNumberSuffix;

        return $this;
    }

    /**
     * Get billingStreetNumberSuffix
     *
     * @return string 
     */
    public function getBillingStreetNumberSuffix()
    {
        return $this->billingStreetNumberSuffix;
    }

    /**
     * Set billingCity
     *
     * @param string $billingCity
     * @return User
     */
    public function setBillingCity($billingCity)
    {
        $this->billingCity = $billingCity;

        return $this;
    }

    /**
     * Get billingCity
     *
     * @return string 
     */
    public function getBillingCity()
    {
        return $this->billingCity;
    }

    /**
     * Set billingZipcode
     *
     * @param string $billingZipcode
     * @return User
     */
    public function setBillingZipcode($billingZipcode)
    {
        $this->billingZipcode = $billingZipcode;

        return $this;
    }

    /**
     * Get billingZipcode
     *
     * @return string 
     */
    public function getBillingZipcode()
    {
        return $this->billingZipcode;
    }

    /**
     * Set billingCountry
     *
     * @param string $billingCountry
     * @return User
     */
    public function setBillingCountry($billingCountry)
    {
        $this->billingCountry = $billingCountry;

        return $this;
    }

    /**
     * Get billingCountry
     *
     * @return string 
     */
    public function getBillingCountry()
    {
        return $this->billingCountry;
    }

    /**
     * Set marketingMails
     *
     * @param boolean $marketingMails
     * @return User
     */
    public function setMarketingMails($marketingMails)
    {
        $this->marketingMails = $marketingMails;

        return $this;
    }

    /**
     * Get marketingMails
     *
     * @return boolean 
     */
    public function getMarketingMails()
    {
        return $this->marketingMails;
    }

    /**
     * Set notes
     *
     * @param string $notes
     * @return User
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }
}
