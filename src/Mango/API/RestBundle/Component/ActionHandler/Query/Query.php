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

    /**
     * @param array $orderBy
     */
    public function setOrderBy(array $orderBy)
    {
        $this->orderBy = $orderBy;
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
     */
    public function setPage($page)
    {
        $this->page = $page;
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
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }
} 