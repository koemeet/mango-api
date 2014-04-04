<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 21:32
 */

namespace Mango\CoreDomain\Model;

/**
 * Class Product
 * @package Mango\CoreDomain\Model
 */
class Product
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var integer
     */
    protected $stock;

    /**
     * @var Customer
     */
    protected $customer;

    /**
     * @var ShopCategory
     */
    protected $category;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Product
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
     * Set stock
     *
     * @param integer $stock
     * @return Product
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set customer
     *
     * @param Customer $customer
     * @return Product
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

    /**
     * Set category
     *
     * @param ShopCategory $category
     * @return Product
     */
    public function setCategory(ShopCategory $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return ShopCategory
     */
    public function getCategory()
    {
        return $this->category;
    }
} 