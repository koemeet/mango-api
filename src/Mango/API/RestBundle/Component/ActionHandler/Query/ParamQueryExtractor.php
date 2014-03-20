<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 23:16
 */

namespace Mango\API\RestBundle\Component\ActionHandler\Query;

use FOS\RestBundle\Request\ParamFetcherInterface;

/**
 * Class ParamQueryExtractor
 * @package Mango\API\RestBundle\Component\ActionHandler\Query
 */
class ParamQueryExtractor
{
    /**
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return Query
     */
    public function extract(ParamFetcherInterface $paramFetcher)
    {
        $query = new Query();
        $query->setOrderBy($this->parseOrderBy($paramFetcher->get('orderBy')));
        $query->setPage($paramFetcher->get('page'));
        $query->setLimit($paramFetcher->get('limit'));

        return $query;
    }

    /**
     * Parse orderBy query parameter to the correct format
     *
     * @param $orderBy
     * @return array
     */
    protected function parseOrderBy($orderBy)
    {
        if ($orderBy === null) {
            return array();
        }

        $orderBy = array_map('trim', explode(',', $orderBy));

        foreach ($orderBy as &$v) {
            $r = array_map('trim', explode(':', $v));
            $r['1'] = strtolower((isset($r['1'])) ? $r['1'] : 'a');

            list($field, $type) = $r;

            $v = array(
                'field' => $field,
                'order' => ($type == 'a') ? 'ASC' : 'DESC'
            );
        }

        return $orderBy;
    }
} 