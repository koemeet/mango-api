<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 05/03/14
 * Time: 13:59
 */

namespace Mango\API\DomainBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\Client as BaseClient;

/**
 * Class Client
 * @package Mango\API\DomainBundle\Entity
 * @ORM\Table(name="oauth_clients")
 * @ORM\Entity
 */
class Client extends BaseClient
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
