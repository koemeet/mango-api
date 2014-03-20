<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 19/03/14
 * Time: 16:14
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\PHPCR\DocumentManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use Mango\API\DomainBundle\Form\RouteType;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandlerInterface;
use Symfony\Cmf\Bundle\RoutingBundle\Form\Type\RouteTypeType;
use Symfony\Component\Routing\Route;

/**
 * Class RoutesController
 * @package Mango\API\RestBundle\Controller
 */
class RoutesController extends FOSRestController
{
    /**
     * Get Routes
     *
     * @Rest\QueryParam(name="uri")
     */
    public function getRoutesAction(ParamFetcher $paramFetcher)
    {
        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine_phpcr.odm.document_manager');

        /** @var $r ArrayCollection */
        $r =  $dm->find(null, '/cms/routes' . $paramFetcher->get('uri'));


        return $r;
    }

    /**
     * Create new route
     */
    public function postRoutesAction()
    {
        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine_phpcr.odm.document_manager');

        /** @var ActionHandlerInterface $handler */
        $handler = $this->get('mango_api_rest.action_handler');

        $route = new Route("team");
        $form = $handler->insert(new RouteType(), $route, false);

        return $form;
    }
} 