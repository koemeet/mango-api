<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:28
 */

namespace Mango\API\RestBundle\Controller;


use Doctrine\ORM\QueryBuilder;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandler;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Request\ParamFetcherInterface;

/**
 * Class CustomersController
 * @package Mango\API\RestBundle\Controller
 */
class CustomersController extends FOSRestController
{
    /**
     * Retrieve customers of Mango
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @ApiDoc(
     *  section="Customers"
     * )
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getCustomersAction(ParamFetcherInterface $paramFetcher)
    {
        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.action_handler');
        $customers = $handler->find("MangoAPIDomainBundle:Customer", $paramFetcher)->getQuery()->getResult();

        return array(
            "customers" => $customers
        );
    }

    public function getCustomerAction($id)
    {
        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.action_handler');
        $user = $handler->findOne("MangoAPIDomainBundle:Customer", $id);
        return array("customer" => $user);
    }

    /**
     * Retrieve customers of Mango
     *
     * @Rest\QueryParam(name="orderBy", description="Sort results by fields in the following notation [field]:[order], where order can be 'a' (ascending) or 'd' (descending)", default=null)
     * @Rest\QueryParam(name="page", description="Pagination for your results", default=1)
     * @Rest\QueryParam(name="limit", description="Number of results to fetch", default=10)
     * @ApiDoc(
     *  section="Customers"
     * )
     * @param $id
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function getCustomerUsersAction($id, ParamFetcherInterface $paramFetcher)
    {
        /** @var ActionHandler $handler */
        $handler = $this->get('mango_api_rest.action_handler');

        /** @var QueryBuilder $qb */
        $qb = $handler->find("MangoAPIDomainBundle:User", $paramFetcher);
        $qb->join('t.customer', 'c');
        $qb->andWhere('c.id = :customer')->setParameter('customer', $id);

        return array("users" => $qb->getQuery()->getResult());
    }

    public function newCustomersAction()
    {

    }
}