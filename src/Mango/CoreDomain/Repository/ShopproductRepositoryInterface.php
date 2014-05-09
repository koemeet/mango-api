<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 09/05/14
 * Time: 15:25
 */

namespace Mango\CoreDomain\Repository;

use Mango\CoreDomain\Model\ShopProduct;

/**
 * Interface ShopproductRepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface ShopproductRepositoryInterface extends RepositoryInterface
{
    /**
     * Create a new shop product.
     *
     * @return ShopProduct
     */
    public function createShopproduct();

    /**
     * Add a shop product to the repository.
     *
     * @param $shopproduct
     * @return mixed
     */
    public function add($shopproduct);
} 