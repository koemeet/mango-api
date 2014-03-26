<?php

namespace Mango\API\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Customer
 *
 * @Serializer\XmlRoot("customer")
 * @Hateoas\Relation(
 *  "self", href = @Hateoas\Route("get_customer", parameters = {"id" = "expr(object.getId())"}, absolute = true)
 * )
 * @Hateoas\Relation(
 *  "new", href = @Hateoas\Route("new_customers", absolute = true)
 * )
 * @Hateoas\Relation(
 *      "users",
 *      href = @Hateoas\Route("get_customer", parameters = {"id" = "expr(object.getId())"}, absolute = true),
 *      embedded = "expr(object.getUsers())",
 *      exclusion = @Hateoas\Exclusion(excludeIf = "expr(object.getUsers().isEmpty())")
 * )
 * @ORM\Table(name="customers", indexes={@ORM\Index(name="fk_customers_customers_idx", columns={"parent_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Customer
{
    /**
     * @var string
     *
     * @Serializer\XmlAttribute
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=128, nullable=true)
     */
    private $company;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=45, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=45, nullable=true)
     */
    private $lastName;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer", cascade={"remove"})
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="customer")
     */
    private $users;

    /**
     * @ORM\Column(name="last_modified", type="datetime")
     */
    private $lastModified;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set company
     *
     * @param string $company
     * @return Customers
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string 
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Customers
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Customers
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
     * Set parent
     *
     * @param Customer $parent
     * @return Customer
     */
    public function setParent(Customer $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return Customer
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add users
     *
     * @param User $users
     * @return Customer
     */
    public function addUser(User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param User $users
     */
    public function removeUser(User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Set lastModified
     *
     * @param \DateTime $lastModified
     * @return Customer
     */
    public function setLastModified($lastModified)
    {
        $this->lastModified = $lastModified;

        return $this;
    }

    /**
     * Get lastModified
     *
     * @return \DateTime 
     */
    public function getLastModified()
    {
        return $this->lastModified;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function onPrePersist()
    {
        $this->setLastModified(new \DateTime());
    }
}
