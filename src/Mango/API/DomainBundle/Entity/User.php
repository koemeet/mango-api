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
     * @ORM\ManyToOne(targetEntity="Customer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     * })
     */
    protected $customer;

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
}
