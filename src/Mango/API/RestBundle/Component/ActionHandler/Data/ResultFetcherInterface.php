<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:43
 */

namespace Mango\API\RestBundle\Component\ActionHandler\Data;

use Mango\API\RestBundle\Component\ActionHandler\Query\Query;

/**
 * Interface ResultFetcherInterface
 * @package Mango\API\RestBundle\Component\ActionHandler\Data
 */
interface ResultFetcherInterface
{
    public function find($entity, Query $query);
    public function findOne($entity, $identifier);
} 