<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:28
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\QueryBuilder;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Mango\CoreDomain\Model\User;
use Mango\CoreDomain\Repository\CustomerRepositoryInterface;
use Mango\CoreDomain\Service\UserService;
use Mango\CoreDomain\Model\Application;
use Mango\CoreDomainBundle\Form\UserType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class CustomersController
 *
 * Reponsible for the representaion (Representation Layer)
 *
 * @package Mango\API\RestBundle\Controller
 */
class CustomersController extends RestController
{
    /**
     * Retrieve customers of Mango
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     *
     * @ApiDoc(
     *  section="Customers"
     * )
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getCustomersAction(ParamFetcherInterface $paramFetcher)
    {
        /** @var CustomerRepositoryInterface $repository */
        $repository = $this->get('mango_core_domain.customer_repository');
        $users = $repository->findAll();

        return $users;

        /** @var UserService $service */
        $service = $this->get('mango_core_domain.user_service');
        $salary = $service->calculateSalary($users['0'], array());

        // TODO: Some layer to fetch something from paramfetcher, this layer is part of the application layer
        // So this belongs inside the RestBundle

        return array('salary' => $salary, 'users' => $users);

//        $handler = $this->getActionHandler();
//        $customers = $handler->find("MangoAPIDomainBundle:Customer", $paramFetcher)->getQuery()->getResult();
//
//        return array(
//            "customers" => $customers
//        );
    }

    public function getCustomerAction($id)
    {
        $handler = $this->getActionHandler();
        $user = $handler->findOne("MangoCoreDomain:Customer", $id);
        return array("customer" => $user);
    }

    /**
     * Retrieve customers of Mango
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @Rest\QueryParam(name="fields", description="Filter fields to serialize")
     *
     * @ApiDoc(
     *  section="Customers"
     * )
     * @param $id
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getCustomerUsersAction($id, ParamFetcherInterface $paramFetcher)
    {
        /** @var QueryBuilder $qb */
        $qb = $this->getActionHandler()->find("MangoAPIDomainBundle:User", $paramFetcher);
        $qb->join('t.customer', 'c');
        $qb->andWhere('c.id = :customer')->setParameter('customer', $id);

        return array("users" => $qb->getQuery()->getResult());
    }

    /**
     * @return Form
     * @ApiDoc(
     *  section="Customers"
     * )
     */
    public function postCustomersAction()
    {
        return $this->processForm(new UserType(), new User());
    }

    public function newCustomersAction()
    {
        $form = $this->postCustomersAction();

        if (!$form instanceof FormInterface) {
            throw new \Exception("Okee, doe maar weer normaal");
        }

        $view = View::create(array('form' => $form->createView(), 'route' => 'post_customers'));
        $view->setFormat('html');
        $view->setTemplate('MangoAPIRestBundle::new.html.twig');

        return $view;
    }
}