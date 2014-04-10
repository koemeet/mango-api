<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:54
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\ODM\PHPCR\DocumentManager;
use FOS\RestBundle\Request\ParamFetcherInterface;
use JMS\Serializer\Serializer;
use JMS\Serializer\SerializerBuilder;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandlerInterface;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcherInterface;
use Mango\API\RestBundle\Component\ActionHandler\Query\ParamQueryExtractor;
use Mango\API\RestBundle\Component\ActionHandler\Query\Query;
use FOS\RestBundle\Controller\Annotations as Rest;
use Mango\API\RestBundle\Request\ParamFetcher\QueryExtractor;
use Mango\Bundle\CmsBundle\Document\Page;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomainBundle\Form\ApplicationType;
use Mango\CoreDomainBundle\Form\UserType;
use Mango\CoreDomainBundle\Service\PageService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;

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
     * @Rest\View(serializerEnableMaxDepthChecks=true)
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Applications"
     * )
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
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     */
    public function getApplicationPagesAction($id, ParamFetcherInterface $paramFetcher)
    {
        /** @var PageRepositoryInterface $repository */
        $repository = $this->get('mango_core_domain.page_repository');
        $query = $this->queryExtractor->extract($paramFetcher);
        return $repository->findByQuery($query);
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

    /**
     * @param $id
     * @param Request $request
     */
    public function postApplicationPagesAction($id, Request $request)
    {
        /** @var PageService $service */
        $pageService = $this->get('mango_core_domain.page_service');

        // Try to create a page, based of a request.
        return $pageService->create($request);
    }
}