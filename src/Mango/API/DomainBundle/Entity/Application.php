<?php

namespace Mango\API\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application
 *
 * @ORM\Table(name="applications", indexes={@ORM\Index(name="fk_applications_applications_idx", columns={"alias_id"}), @ORM\Index(name="fk_application_customers_idx", columns={"customer_id"})})
 * @ORM\Entity
 */
class Application
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="sync_with_alias", type="string", length=45, nullable=true)
     */
    private $syncWithAlias;

    /**
     * @var \Application
     *
     * @ORM\ManyToOne(targetEntity="Application")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="alias_id", referencedColumnName="id")
     * })
     */
    private $alias;

    /**
     * @var \Customer
     *
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    private $customer;



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
     * Set name
     *
     * @param string $name
     * @return Applications
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set syncWithAlias
     *
     * @param string $syncWithAlias
     * @return Applications
     */
    public function setSyncWithAlias($syncWithAlias)
    {
        $this->syncWithAlias = $syncWithAlias;

        return $this;
    }

    /**
     * Get syncWithAlias
     *
     * @return string 
     */
    public function getSyncWithAlias()
    {
        return $this->syncWithAlias;
    }

    /**
     * Set alias
     *
     * @param Application $alias
     * @return Application
     */
    public function setAlias(Application $alias = null)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return Application
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set customer
     *
     * @param Customer $customer
     * @return $this
     */
    public function setCustomer(Customer $customer = null)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
}
