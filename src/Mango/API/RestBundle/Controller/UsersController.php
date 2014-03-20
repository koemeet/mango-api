<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:37
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\ORM\EntityManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use FOS\UserBundle\Entity\UserManager;
use FOS\UserBundle\Model\UserManagerInterface;
use Mango\API\DomainBundle\Entity\User;
use Mango\API\DomainBundle\Form\UserType;
use Mango\API\RestBundle\Common\ActionHandler;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UsersController
 * @package Mango\API\RestBundle\Controller
 */
class UsersController extends FOSRestController
{
    /**
     * Retrieve customers of Mango
     *
     * @Rest\View
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @ApiDoc(
     *  section="Customers"
     * )
     * @param \FOS\RestBundle\Request\ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getUsersAction(ParamFetcherInterface $paramFetcher)
    {
        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.action_handler');
        $qb = $handler->find("MangoAPIDomainBundle:User", $paramFetcher);
        return array("users" => $qb->getQuery()->getResult());
    }

    public function getUserAction($id)
    {
        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.action_handler');
        $user = $handler->findOne("MangoAPIDomainBundle:User", $id);
        return $user;
    }

    /**
     * @ApiDoc(
     *  input = "Mango\API\DomainBundle\Form\UserType"
     * )
     * @return \Symfony\Component\Form\FormInterface
     */
    public function postUsersAction()
    {
        /** @var ActionHandler $handler */
        $handler = $this->get('mango_api_rest.action_handler');

        $user = new User();
        return $handler->insert(new UserType(), $user);
    }

    /**
     * @Rest\View
     * @ApiDoc(
     *  input = "Mango\API\DomainBundle\Form\UserType"
     * )
     * @param $id
     * @return \Symfony\Component\Form\FormInterface
     */
    public function putUserAction($id)
    {
        // TODO: Move fetching of domain model to the action handler, but leave the option open to pass a domain model.

        /** @var EntityManager $em */
        $em = $this->get("doctrine.orm.entity_manager");

        /** @var User $user */
        $user = $em->getRepository('MangoAPIDomainBundle:User')->find($id);

        /** @var ActionHandler $handler */
        $handler = $this->get('mango_api_rest.action_handler');

        // We handle persisting of the user ourself
        $form = $handler->update(new UserType(), $user, false);

        if ($form->isValid()) {
            /** @var UserManager $manager */
            $manager = $this->get('fos_user.user_manager');
            $manager->updateUser($user, true);

            return View::create($user, 200);
        }

        return $form;
    }

    public function newUsersAction()
    {
        return "ksdjfksjdf";
    }
}