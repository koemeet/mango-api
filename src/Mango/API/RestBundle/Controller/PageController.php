<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:42
 */

namespace Mango\API\RestBundle\Controller;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;

/**
 * Class PageController
 * @package Mango\API\RestBundle\Controller
 */
class PageController extends RestController
{
    /**
     * @param ResultFetcherInterface $resultFetcher
     */
    public function getPagesAction(ResultFetcherInterface $resultFetcher)
    {
        /** @var ResultFetcherInterface $resultFetcher */
        $resultFetcher = $this->get('mango_api_rest.phpcr.result_fetcher');

        $query = new Query();
        $root = '/cms/applications/1';

        // Find all pages for this application
        $resultFetcher->find($root . '/pages', $query);
    }
}