<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:01
 */

namespace Mango\CoreDomainBundle\Document;

use Mango\CoreDomain\Model\StoreProduct as BaseStoreProduct;
use Netvlies\Bundle\DoctrineBridgeBundle\Mapping\Annotations as BRIDGE;
/**
 * Class StoreProduct
 *
 * @package Mango\CoreDomainBundle\Document
 */
class StoreProduct extends BaseStoreProduct
{
    protected $parent;
    protected $path;

    /**
     * @BRIDGE\Entity(targetEntity="MangoCoreDomain:Workspace", entityManager="default")
     */
    protected $workspace;

    /**
     * @param mixed $parent
     */
    public function setParent($parent)
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }
}