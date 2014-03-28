<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:54
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandlerInterface;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\ParamQueryExtractor;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class ApplicationsController
 * @package Mango\API\RestBundle\Controller
 */
class ApplicationsController extends RestController
{
    public function getApplicationsAction()
    {
        return array();
    }

    /**
     * Get the pages for a specific application
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     */
    public function getApplicationPagesAction($id, ParamFetcherInterface $paramFetcher)
    {
        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.phpcr_action_handler');
        return $handler->find('Mango\\API\\RestBundle\\Document\\Page', $paramFetcher);
    }
}