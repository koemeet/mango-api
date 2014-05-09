<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:01
 */

namespace Mango\CoreDomainBundle\Document;

use Mango\CoreDomain\Model\ShopProduct as BaseShopProduct;

/**
 * Class ShopProduct
 *
 * @package Mango\CoreDomainBundle\Document
 */
class ShopProduct extends BaseShopProduct
{
    protected $parent;
    protected $path;
    protected $name;

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

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
} 