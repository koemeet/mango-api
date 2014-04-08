<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 4/8/14
 * Time: 10:36 PM
 */

namespace Mango\API\RestBundle\Request\ParamFetcher;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;

/**
 * Class QueryExtractor
 *
 * @package Mango\API\RestBundle\Request\ParamFetcher
 */
class QueryExtractor
{
    /**
     * Extract Query from a ParamFetcher instance
     *
     * @param ParamFetcherInterface $paramFetcher
     * @return static
     */
    public function extract(ParamFetcherInterface $paramFetcher)
    {
        return Query::create();
    }
} 