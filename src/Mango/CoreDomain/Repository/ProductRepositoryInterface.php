<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 15:03
 */

namespace Mango\CoreDomain\Repository;
use Mango\CoreDomain\Model\Product;
use Mango\CoreDomain\Model\Workspace;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface ProductRepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface ProductRepositoryInterface extends GenericRepositoryInterface
{
    /**
     * Create a new product object.
     *
     * @return Product
     */
    public function createProduct();

    /**
     * Add product.
     *
     * @param mixed $product
     * @return mixed
     */
    public function add($product);

    /**
     * Find products by workspace.
     *
     * @param Workspace $workspace
     * @param Query     $query
     * @return mixed
     */
    public function findByWorkspace(Workspace $workspace, Query $query = null);
}