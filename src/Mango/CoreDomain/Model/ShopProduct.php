<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 25/04/14
 * Time: 16:36
 */

namespace Mango\CoreDomain\Model;

/**
 * Class ShopProduct
 * @package Mango\CoreDomain\Model
 */
class ShopProduct extends Product
{
    /**
     * @var Application
     */
    protected $application;

    /**
     * @var Image[]
     */
    protected $images = array();

    /**
     * @param Application $application
     */
    public function setApplication($application)
    {
        $this->application = $application;
    }

    /**
     * @return Application
     */
    public function getApplication()
    {
        return $this->application;
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