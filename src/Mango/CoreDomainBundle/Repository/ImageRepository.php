<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 17/04/14
 * Time: 15:04
 */

namespace Mango\CoreDomainBundle\Repository;
use Mango\CoreDomain\Persistence\Query;
use Mango\CoreDomain\Repository\ImageRepositoryInterface;

/**
 * Class ImageRepository
 * @package Mango\CoreDomainBundle\Repository
 */
class ImageRepository implements ImageRepositoryInterface
{
    /**
     * Find records by identifier.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * Find all records.
     *
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findAll($limit = 10, $offset = 0)
    {
        // TODO: Implement findAll() method.
    }

    /**
     * Find records by certain criteria.
     *
     * @param array $criteria
     * @param int $limit
     * @param int $offset
     * @return mixed
     */
    public function findBy(array $criteria = array(), $limit = 10, $offset = 0)
    {
        // TODO: Implement findBy() method.
    }

    /**
     * Find records with the provided Query context.
     *
     * @param $query
     * @return mixed
     */
    public function findByQuery(Query $query)
    {
        // TODO: Implement findByQuery() method.
    }
} 