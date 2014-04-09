<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 4/8/14
 * Time: 10:36 PM
 */

namespace Mango\API\RestBundle\Request\ParamFetcher;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Mango\CoreDomain\Persistence\Query;

/**
 * Class QueryExtractor
 *
 * @package Mango\API\RestBundle\Request\ParamFetcher
 */
class QueryExtractor
{
    /**
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return Query
     */
    public function extract(ParamFetcherInterface $paramFetcher)
    {
        $query = new Query();
        $query->setOrderBy($this->parseOrderBy($paramFetcher->get('sort')));
        $query->setLimit($paramFetcher->get('limit'));
        $query->setOffset(($paramFetcher->get('page') - 1) * $query->getLimit());

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

        $array = array();
        foreach ($orderBy as $v) {
            $r = array_map('trim', explode(':', $v));
            $r['1'] = strtolower((isset($r['1'])) ? $r['1'] : 'a');

            list($field, $type) = $r;

            $array[$field] = ($type == 'a') ? 'ASC' : 'DESC';
        }

        return $array;
    }

    /**
     * Parses comma seperated string to multi dimensional array supported by
     * the Query object.
     *
     * @param $fields
     * @return array
     */
    protected function parseFields($fields)
    {
        $fields = array_map('trim', explode(',', $fields));
        $fields = array_flip($fields);

        foreach ($fields as $field => &$value) {
            $mapping = $this->parseFieldMapping($field);
            $root = $mapping['root'];
            $fields[$root] = $mapping['values'];

            if ($root != $field) {
                unset($fields[$field]);
            }
        }

        return $fields;
    }

    /**
     * Parses a field like this: `comments.author.crack` to a multi dimensional array
     *
     *  To:
     *  array(
     *      "comments" => array(
     *          "author" => array(
     *              "crack" => array()
     *          )
     *      )
     *  )
     * @param $field
     * @return array
     */
    protected function parseFieldMapping($field)
    {
        $fields = explode('.', $field);
        $root = array_shift($fields);

        $crack = array();
        $tmp =& $crack;

        foreach ($fields as $field) {
            $tmp[$field] = array();
            $tmp =& $tmp[$field];
        }

        return array(
            'root' => $root,
            'values' => $crack
        );
    }
} 