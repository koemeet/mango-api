<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 08/05/14
 * Time: 21:15
 */

namespace Mango\CoreDomain\Repository;

use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\Category;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface CategoryRepositoryInterface
 *
 * @package Mango\CoreDomain\Repository
 */
interface CategoryRepositoryInterface extends RepositoryInterface
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

    /**
     * Find categories by application.
     *
     * @param Application $application
     * @param Query       $query
     * @return mixed
     */
    public function findByApplication(Application $application, Query $query = null);
}