<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:37
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use FOS\UserBundle\Entity\UserManager;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\ApplicationRepositoryInterface;
use Mango\CoreDomain\Repository\UserRepositoryInterface;
use Mango\CoreDomainBundle\Form\UserType;
use Mango\CoreDomainBundle\Service\UserService;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class UsersController
 * @package Mango\API\RestBundle\Controller
 */
class UsersController extends RestController
{
    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var UserRepositoryInterface
     */
    protected $userRepository;

    /**
     * Setup neccessary attributes.
     */
    public function init()
    {
        $this->userService = $this->container->get('mango_core_domain.user_service');
        $this->userRepository = $this->get('mango_core_domain.user_repository');
    }

    /**
     * Retrieve all users of Mango.
     *
     * @Rest\View
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     * @ApiDoc(
     *  section="Users"
     * )
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getUsersAction(ParamFetcherInterface $paramFetcher)
    {
        $query = $this->queryExtractor->extract($paramFetcher);
        return array('users' => $this->userRepository->findByQuery($query));
    }

    /**
     * Get user by it's id
     *
     * @ApiDoc(
     *  section = "Users"
     * )
     * @param $id
     * @return mixed
     */
    public function getUserAction($id)
    {
        return array('user' => $this->userService->findByIdentifier($id));
    }

    /**
     * @ApiDoc(
     *  section = "Users",
     *  input = "Mango\API\DomainBundle\Form\UserType"
     * )
     * @return \Symfony\Component\Form\FormInterface
     */
    public function postUsersAction()
    {
        return $this->processForm(new UserType(), new User());
    }

    /**
     * @Rest\View
     * @ApiDoc(
     *  section = "Users",
     *  input = "Mango\API\DomainBundle\Form\UserType"
     * )
     * @param $id
     * @return \Symfony\Component\Form\FormInterface
     */
    public function putUserAction($id)
    {
        $user = $this->userService->findByIdentifier($id);
        return $this->processForm(new UserType(), $user);
    }

    /**
     * Create a new user from a HTML form.
     *
     * @ApiDoc(
     *  section = "Users"
     * )
     * @return View
     */
    public function newUsersAction()
    {
        return $this->generateNewView($this->postUsersAction(), 'post_users');
    }

    /**
     * Retrieve a collection of applications for the given user. This can be used in order to list all the applications
     * that this user has access to. You can also filter on workspace, which you almost always need.
     *
     * <strong>NOTE:</strong> When displaying applications of a user IN a workspace, specify the <code>workspace</code> filter.
     *
     * <small>TODO: Document how you can retrieve the users permissions for the applications.</small>
     *
     * @Rest\QueryParam(name="sort", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", requirements="(foo|bar) ASC|DESC")
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="filter", description="Filter fields to serialize")
     * @Rest\QueryParam(name="workspace", description="Filter on a specific workspace")
     * @ApiDoc(
     *  section = "Users",
     *  resource=true,
     *  description="Retrieve a collection of applications for the given user",
     *  filters={
     *      {"name"="filter", "hot"="Select all hot applications", "cold"="Select all cold applications"}
     *  },
     *  statusCodes={
     *      200="Returned when successful.",
     *      403="Returned when the user is not authorized.",
     *      404={
     *          "Returned when the user is not found."
     *      }
     *  }
     * )
     * @param $id
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return array
     */
    public function getUserApplicationsAction($id, ParamFetcherInterface $paramFetcher)
    {
        $user = $this->userService->findByIdentifier($id);

        if (!$user) {
            throw new ResourceNotFoundException(sprintf("Could not find user with identifier %s.", $id));
        }

        /** @var ApplicationRepositoryInterface $applicationRepository */
        $applicationRepository = $this->get('mango_core_domain.application_repository');
        $query = $this->queryExtractor->extract($paramFetcher);

        $applicationRepository->findByQuery($query);

        return array('applications' => $user->getApplications());
    }

    /**
     * Get workspaces for this user
     *
     * @param $id
     * @return array
     */
    public function getUserWorkspacesAction($id)
    {
        $user = $this->userService->findByIdentifier($id);

        return array('workspaces' => $user->getWorkspaces());
    }
}