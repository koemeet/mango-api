<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 14:54
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
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
use Mango\API\RestBundle\Serializer\View;
use Mango\Bundle\CmsBundle\Document\Page;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Mango\CoreDomain\Repository\CategoryRepositoryInterface;
use Mango\CoreDomain\Repository\MenuRepositoryInterface;
use Mango\CoreDomain\Repository\PageRepositoryInterface;
use Mango\CoreDomain\Repository\RouteRepositoryInterface;
use Mango\CoreDomain\Repository\ShopproductRepositoryInterface;
use Mango\CoreDomainBundle\Form\ApplicationType;
use Mango\CoreDomainBundle\Form\UserType;
use Mango\CoreDomainBundle\Service\PageService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use PHPCR\Util\NodeHelper;
use Symfony\Cmf\Bundle\ContentBundle\Model\StaticContent;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\Menu;
use Symfony\Cmf\Bundle\MenuBundle\Doctrine\Phpcr\MenuNode;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

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

    /**
     * @var PageService
     */
    protected $pageService;

    public function init()
    {
        //$this->applicationRepository = $this->get('mango_core_domain.application_repository');
        //$this->pageService = $this->get('mango_core_domain.page_service');
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
        $repo = $this->get('sylius.repository.page');
        $appRepo = $this->get('mango.repository.application');
        $app = $appRepo->find(2);
        return $repo->findByApplication($app);
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
        $results = $this->get('mango.repository.application')->find($id);

        // TODO: Nice way to do this shit
        return array(
            'meta' => array(
                'page' => 5
            ),
            'applications' => array($results)
        );
    }

    /**
     * Get application routes.
     *
     * @ApiDoc(
     *  section = "Applications"
     * )
     * @param $id
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return array
     */
    public function getApplicationRoutesAction($id)
    {
        $application = $this->applicationRepository->find($id);
        if (!$application) {
            throw new ResourceNotFoundException(sprintf('No application with the id "%s" exists.', $id));
        }

        /** @var RouteRepositoryInterface $routeRepository */
        $routeRepository = $this->get('mango_core_domain.route_repository');
        $routes = $routeRepository->findByApplication($application);

        return array('routes' => $routes);
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
        $application = $this->get('mango.repository.application')->find($id);

        if (!$application) {
            throw new NotFoundHttpException(sprintf(
                'Could not find application with id: %s',
                $id
            ));
        }

        $pages = $this->get('sylius.repository.page')->findByApplication($application);

        return array('pages' => $pages);
    }

    /**
     * Get all categories that belong to an application.
     *
     * @ApiDoc(
     *  section = "Applications"
     * )
     * @param $id
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return array
     */
    public function getApplicationCategoriesAction($id)
    {
        $application = $this->applicationRepository->find($id);

        if (!$application) {
            throw new ResourceNotFoundException(sprintf('Application with id "%s" does not exist.', $id));
        }

        /** @var CategoryRepositoryInterface $categoryRepository */
        $categoryRepository = $this->get('mango_core_domain.category_repository');

        return array(
            'categories' => $categoryRepository->findByApplication($application)
        );
    }

    /**
     * @ApiDoc(
     *  section = "Applications"
     * )
     * @param $id
     * @return array
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     */
    public function getApplicationMenusAction($id)
    {
        $application = $this->get('mango.repository.application')->find($id);
        if (!$application) {
            throw new NotFoundHttpException(sprintf(
                'Could not find application with id: %s',
                $id
            ));
        }

        $menus = $this->get('mango.repository.menu')->findByApplication($application);
        return array('menus' => $menus);
    }

    /**
     * Find shop products by application
     *
     * @ApiDoc(
     *  section = "Applications"
     * )
     * @param $id
     * @return array
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     */
    public function getApplicationShopproductsAction($id)
    {
        $application = $this->applicationRepository->find($id);
        if (!$application) {
            throw new ResourceNotFoundException(sprintf('Application with id "%s" does not exist.', $id));
        }

        /** @var ShopproductRepositoryInterface $shopproductRepository */
        $shopproductRepository = $this->get('mango_core_domain.shopproduct_repository');
        $products = $shopproductRepository->findByApplication($application);

        return array('shopproducts' => $products);
    }

    /**
     * @param int                   $id
     * @param ParamFetcherInterface $paramFetcher
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     */
    public function getApplicationRelatedAction($id, ParamFetcherInterface $paramFetcher)
    {
        throw new ResourceNotFoundException("Not implemented");
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
        // TODO: Create application service class
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

        $request->request->set('application', $id);
        return $pageService->create($request);
    }
}