<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/04/14
 * Time: 21:32
 */

namespace Mango\CoreDomain\Model;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Product
 * @package Mango\CoreDomain\Model
 */
class Product
{
    const TYPE_SIMPLE = 0;
    const TYPE_BUNDLE = 1;
    const TYPE_DOWNLOAD = 2;
    const TYPE_SERVICE = 3;

    /**
     * @var integer
     */
    protected $id;

    /**
     * @var integer
     */
    protected $productType;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var ProductPrice
     */
    protected $price;

    /**
     * @var ProductPrice
     */
    protected $retailPrice;

    /**
     * @var Brand
     */
    protected $brand;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var integer
     */
    protected $stock;

    /**
     * @var Category
     */
    protected $category;

    /**
     * @var ArrayCollection
     */
    protected $tags;

    /**
     * @var ArrayCollection
     */
    protected $images;

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->images = new ArrayCollection();
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

    /**
     * @param int $productType
     */
    public function setProductType($productType)
    {
        $this->productType = $productType;
    }

    /**
     * @return int
     */
    public function getProductType()
    {
        return $this->productType;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param Brand $brand
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    /**
     * @return Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param ProductPrice $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return ProductPrice
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param ProductPrice $retailPrice
     */
    public function setRetailPrice($retailPrice)
    {
        $this->retailPrice = $retailPrice;
    }

    /**
     * @return ProductPrice
     */
    public function getRetailPrice()
    {
        return $this->retailPrice;
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
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param array $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }

    /**
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param Image[] $images
     */
    public function setImages($images)
    {
        $this->images = $images;
    }

    /**
     * @return Image[]
     */
    public function getImages()
    {
        return $this->images;
    }
} 