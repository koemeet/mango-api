<?php

namespace Mango\API\SecurityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
/**
 * AccessToken
 */
class AccessToken extends BaseAccessToken
{
    /**
     * @var integer
     */
    protected $id;
}
