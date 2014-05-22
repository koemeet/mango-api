<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 11:18
 */

namespace Mango\API\RestBundle\Controller;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Mango\CoreDomain\Model\Workspace;
use Mango\CoreDomain\Repository\ProductRepositoryInterface;
use Mango\CoreDomain\Repository\UserRepositoryInterface;
use Mango\CoreDomain\Repository\WorkspaceRepositoryInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;


/**
 * Class WorkspacesController
 * @package Mango\API\RestBundle\Controller
 */
class WorkspacesController extends RestController
{
    /**
     * @var WorkspaceRepositoryInterface
     */
    protected $workspaceRepository;

    /**
     * @var UserRepositoryInterface;
     */
    protected $userRepository;

    public function init()
    {
        $this->workspaceRepository = $this->get('mango_core_domain.workspace_repository');
        $this->userRepository = $this->get('mango_core_domain.user_repository');
    }

    /**
     * Retrieve all users of Mango.
     *
     * @Rest\View(serializerEnableMaxDepthChecks=true)
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="count", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="filter", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Workspaces"
     * )
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getWorkspacesAction(ParamFetcherInterface $paramFetcher)
    {
        $query = $this->queryExtractor->extract($paramFetcher);
        return array('workspaces' => $this->workspaceRepository->findByQuery($query));
    }

    /**
     * Find a single workspace by id.
     *
     * @ApiDoc(
     *  section="Workspaces"
     * )
     * @param $id
     * @return mixed
     */
    public function getWorkspaceAction($id)
    {
        return array('workspaces' => array($this->workspaceRepository->find($id)));
    }

    /**
     * Find products in a workspace.
     *
     * @ApiDoc(
     *  section = "Workspaces"
     * )
     * @param $id
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return array
     */
    public function getWorkspaceProductsAction($id)
    {
        $workspace = $this->workspaceRepository->find($id);
        if (!$workspace) {
            throw new ResourceNotFoundException(sprintf('Workspace with id "%s" does not exist.', $id));
        }

        /** @var ProductRepositoryInterface $productRepository */
        $productRepository = $this->get('mango_core_domain.product_repository');
        $products = $productRepository->findByWorkspace($workspace);
        return array('products' => $products);
    }

    /**
     * Get all users for a workspace.
     *
     * @ApiDoc(
     *  section="Workspaces"
     * )
     * @param $id
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return array
     */
    public function getWorkspaceUsersAction($id)
    {
        /** @var Workspace $workspace */
        $workspace = $this->workspaceRepository->find($id);

        if (!$workspace) {
            throw new ResourceNotFoundException(sprintf("Workspace with id %s could not be found.", $id));
        }

        $users = $this->userRepository->findByWorkspace($workspace);

        return array('users' => $users);
    }
} 