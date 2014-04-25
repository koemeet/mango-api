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
     * @var Image[]
     */
    protected $images = array();
}