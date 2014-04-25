<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 26/04/14
 * Time: 00:55
 */

namespace Mango\CoreDomain\Repository;
use Mango\CoreDomain\Data\PaginatedResult;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface ObjectRepository
 * @package Mango\CoreDomain\Repository
 */
interface ObjectRepository
{
    /**
     * @param $id
     * @return object
     */
    public function find($id);

    /**
     * @param Query $query
     * @return PaginatedResult
     */
    public function findByQuery(Query $query);
}