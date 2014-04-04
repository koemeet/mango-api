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
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class ApplicationsController
 * @package Mango\API\RestBundle\Controller
 */
class ApplicationsController extends RestController
{
    /**
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return array
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Applications"
     * )
     */
    public function getApplicationsAction(ParamFetcherInterface $paramFetcher)
    {
        /** @var ApplicationRepositoryInterface $repository */
        $repository = $this->get('mango_core_domain.application_repository');
        return array('applications' => $repository->findAll($paramFetcher->get('limit')));
    }

    /**
     * Get a single application
     *
     * @ApiDoc(
     *  section="Applications"
     * )
     */
    public function getApplicationAction($id)
    {
        /** @var ApplicationRepositoryInterface $repository */
        $repository = $this->get('mango_core_domain.application_repository');
        return array('application' => $repository->find($id));
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