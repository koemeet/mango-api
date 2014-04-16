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
     * Retrieve applications in the widest scope possible. You will most probably never use this.
     *
     * @Rest\View(serializerEnableMaxDepthChecks=true)
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="count", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="filter", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Applications",
     *  description="Retrieve applications in the widest scope possible."
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
     * Retrieve an application by its identifier. This can come in handy in many cases, for example on a detail page
     * of an application. This URL is the <strong>only</strong> one capable of retrieving applications by its identifier.
     *
     * @ApiDoc(
     *  section = "Applications",
     *  description = "Retrieve an application by it's identifier."
     * )
     */
    public function getApplicationAction($id)
    {
        return array('application' => $this->applicationRepository->find($id));
    }

    /**
     * Retrieve a collection of <code>pages</code> for the given application. Pages have content and do have a
     * route connected to it. If you want to retrieve all the available routes, look for the <code>routes</code> resource.
     *
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="count", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="filter", description="Filter results")
     * @ApiDoc(
     *  section = "Applications"
     * )
     */
    public function getApplicationPagesAction($id, ParamFetcherInterface $paramFetcher)
    {
        /** @var PageRepositoryInterface $repository */
        $repository = $this->get('mango_core_domain.page_repository');
        $query = $this->queryExtractor->extract($paramFetcher);
        return array('pages' => $repository->findByQuery($query));
    }

    /**
     * Create a new application
     *
     * @ApiDoc(
     *  section = "Applications",
     *  input = "Mango\CoreDomainBundle\Form\ApplicationType"
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
     * Add a page to application.
     *
     * @ApiDoc(
     *  section = "Applications",
     *  input = "Mango\CoreDomainBundle\Form\PageType"
     * )
     * @param $id
     * @param Request $request
     * @return mixed
     */
    public function postApplicationPagesAction($id, Request $request)
    {
        /** @var PageService $pageService */
        $pageService = $this->get('mango_core_domain.page_service');

        // Try to create a page, based of a request.
        return $pageService->createByApplicationId($id, $request);
    }
}