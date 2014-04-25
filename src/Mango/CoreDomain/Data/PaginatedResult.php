<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 25/04/14
 * Time: 23:54
 */

namespace Mango\CoreDomain\Data;

/**
 * Class PaginatedResult
 *
 * Provides a way to have getters for total count, limit and offset of a result. But in the same time, act like
 * an array.
 *
 * @package Mango\CoreDomain\Data
 */
class PaginatedResult extends \ArrayObject
{
    protected $count;
    protected $limit;
    protected $offset;

    /**
     * Constructor.
     *
     * @param array|null|object $count
     * @param int $limit
     * @param string $offset
     * @param array $data
     */
    public function __construct($count, $limit, $offset, array $data)
    {
        $this->count = $count;
        $this->limit = $limit;
        $this->offset = $offset;

        parent::__construct($data);
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }
} 