<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 03/04/14
 * Time: 16:40
 */

namespace Mango\CoreDomain\Repository;
use Mango\CoreDomain\Persistence\Query;

/**
 * Interface GenericRepositoryInterface
 * @package Mango\CoreDomain\Repository
 */
interface GenericRepositoryInterface
{
    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * Find all records.
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0);

    /**
     * Find records by certain criteria.
     *
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0);


    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return mixed
     */
    public function findByQuery(Query $query);
}