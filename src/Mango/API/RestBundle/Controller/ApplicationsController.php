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
use Mango\API\RestBundle\Request\ParamFetcher\QueryExtractor;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Mango\CoreDomainBundle\Form\ApplicationType;
use Mango\CoreDomainBundle\Form\UserType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class ApplicationsController
 * @package Mango\API\RestBundle\Controller
 */
class ApplicationsController extends RestController
{
    /**
     * @var ApplicationRepositoryInterface
     */
    protected $applicationRepository;

    public function init()
    {
        $this->applicationRepository = $this->get('mango_core_domain.application_repository');
    }

    /**
     * Retrieve all applications of all users and companies.
     *
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Applications"
     * )
     *
     * @param ParamFetcherInterface $paramFetcher
     * @return array
     */
    public function getApplicationsAction(ParamFetcherInterface $paramFetcher)
    {
        $query = $this->queryExtractor->extract($paramFetcher);
        return array('applications' => $this->applicationRepository->findByQuery($query));
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
        return array('application' => $this->applicationRepository->find($id));
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

    /**
     * Create a new application.
     *
     * @ApiDoc(
     *  section = "Users",
     *  input = "Mango\API\DomainBundle\Form\UserType"
     * )
     * @return \Symfony\Component\Form\FormInterface
     */
    public function postApplicationsAction()
    {
        return $this->processForm(new ApplicationType(), new Application());
    }

    /**
     * Creata a new application inside a HTML form.
     *
     * @return \FOS\RestBundle\View\View
     */
    public function newApplicationsAction()
    {
        return $this->generateNewView($this->postApplicationsAction(), 'post_applications');
    }
}