<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 21:15
 */

namespace Mango\CoreDomain\Repository;
use Mango\CoreDomain\Model\Category;

/**
 * Interface CategoryRepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface CategoryRepositoryInterface extends GenericRepositoryInterface
{
    /**
     * Create a new category object.
     *
     * @return Category
     */
    public function createCategory();

    /**
     * Add category.
     *
     * @param $category
     */
    public function add($category);
}