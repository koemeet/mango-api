<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 23:15
 */

namespace Mango\API\RestBundle\Component\ActionHandler\Query;

/**
 * Class Query
 * @package Mango\API\RestBundle\Component\ActionHandler\Query
 */
class Query
{
    /**
     * @var array
     */
    protected $orderBy = array();
    protected $page = 1;
    protected $limit = 10;
    protected $fields = array();

    /**
     * @return static
     */
    public static function create()
    {
        return new static();
    }

    /**
     * @param array $orderBy
     * @return $this
     */
    public function setOrderBy(array $orderBy)
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
     * @param int $page
     * @return $this
     */
    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @param int $limit
     * @return $this
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
        return $this;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * Fields are always based on the key in the array, where the value defines dependencies or properties
     * of this field.
     *
     * Format example:
     *  array(
     *      "users" => array()
     *      "comments" => array(
     *          "author" => array()
     *      )
     *  )
     *
     * @param array $fields
     * @return $this
     */
    public function setFields(array $fields)
    {
        $this->fields = $fields;
        return $this;
    }

    /**
     * @return array
     */
    public function getFields()
    {
        return $this->fields;
    }
} 