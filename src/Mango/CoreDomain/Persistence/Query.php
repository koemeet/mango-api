<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 07/04/14
 * Time: 20:40
 */

namespace Mango\CoreDomain\Persistence;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Query
 * @package Mango\CoreDomain\Persistence
 */
class Query
{
    /**
     * @var int
     */
    protected $limit = 10;

    /**
     * @var int
     */
    protected $offset = 0;

    /**
     * @var array
     */
    protected $orderBy = array();

    /**
     * @var array
     */
    protected $filters = array();

    /**
     * @var array
     */
    protected $where = array();

    /**
     * Create a new Query instance
     *
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param mixed $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @param array $filter
     */
    public function setFilters($filter)
    {
        $this->filters = $filter;
    }

    /**
     * @param $name
     */
    public function addFilter($name)
    {
        $this->filters[] = $name;
    }

    /**
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param mixed $offset
     * @return $this
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @param array $orderBy
     * @return $this
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;
        return $this;
    }

    /**
     * @return array
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Add field to sort on.
     *
     * @param $field
     * @param $order
     * @return $this
     */
    public function addOrderBy($field, $order)
    {
        $this->orderBy[$field] = $order;
        return $this;
    }

    /**
     * Remove field from order by.
     *
     * @param $field
     * @return $this
     */
    public function removeOrderBy($field)
    {
        unset($this->orderBy[$field]);
        return $this;
    }

    /**
     * @param array $where
     * @return $this
     */
    public function setWhere($where)
    {
        $this->where = $where;
        return $this;
    }

    /**
     * @param $field
     * @param $value
     * @return $this
     */
    public function addWhere($field, $value)
    {
        $this->where[$field] = $value;
        return $this;
    }

    /**
     * @return array
     */
    public function getWhere()
    {
        return $this->where;
    }
} 