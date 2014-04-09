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
     * Retrieve all applications of all users and companies.
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
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
        // Repository is at the Infrastructure Layer, this means handling of persistance and tools for the system. Nothing
        // related to the application itself, BUT it may provide handy shit FOR the application.

        /** @var ApplicationRepositoryInterface $repository */
        $repository = $this->get('mango_core_domain.application_repository');

        // TODO: Implement this nicely, this is just proof of concept
        // We need some kind of extractor to create a Query object out of a ParamFetcherInterface.
        // This needs to be a service ofcource, so we can replace it easily and that kind of shit.
        // Layer: Application Layer
        //$extractor = new QueryExtractor();

        // Or we can do this..
        // Create a service for the domain models and make it so, that it can accept an ParamFetcherInterface.
        // This service has the repository injected and can Query on it along with an Query Extractor.
        // Cons: Extra service for every domain model. More complexity.
        // Pros: Only that it is one line shorter :P
        // Layer: Application Layer
        //$this->get('mango_api_rest.user_service')->findByParamFetcher($paramFetcher);

        // Repository::findByQuery can find domain models based of a Query object, which is part of the CoreDomain.
        return array('applications' => $repository->findAll());
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

    /**
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

    public function newApplicationsAction()
    {
        $form = $this->postApplicationsAction();
        return $this->generateNewView($form, 'post_applications');
    }
}