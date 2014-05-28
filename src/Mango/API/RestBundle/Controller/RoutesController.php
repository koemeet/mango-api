<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 19/03/14
 * Time: 16:14
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\ODM\PHPCR\DocumentManager;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\View\View;
use Mango\API\DomainBundle\Form\RouteType;
use Symfony\Cmf\Bundle\RoutingBundle\Doctrine\Phpcr\Route;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;

/**
 * Class RoutesController
 * @package Mango\API\RestBundle\Controller
 */
class RoutesController extends FOSRestController
{
    /**
     * Get routes candidates by uri
     *
     * @ApiDoc(
     *  section = "Routes"
     * )
     * @Rest\QueryParam(name="uri")
     */
    public function getRoutesAction(ParamFetcher $paramFetcher)
    {
        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine_phpcr.odm.document_manager');
        $url = $paramFetcher->get('uri');

        $routes =  $dm->find(null, '/cms/routes');

        return $routes;

    }

    /**
     * @param $id
     */
    public function getRouteAction($id)
    {
        return array(1, 2, 3);
    }

    /**
     * Create new route
     *
     * @ApiDoc(
     *  section = "Routes"
     * )
     */
    public function postRoutesAction()
    {
        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine_phpcr.odm.document_manager');

        $route = new Route();
        $route->setPosition($dm->find(null, '/cms/routes'), 'en');

        /** @var FormInterface $form */
        $form = $this->createForm(new RouteType(), $route);

        $data = $this->get('request')->request->all();
        $data = array_intersect_key($data, $form->all());
        $form->submit($data);

        if ($form->isValid()) {
            $dm->persist($route);
            $dm->flush();

            return new View($route, 201);
        }

        return $form;
    }

    /**
     * Update route, you can path the following fields:
     * <ul>
     *   <li>targetPath (will move the route)</li>
     *   <li>name  (will move the route)</li>
     * </ul>
     * @ApiDoc(
     *  section = "Routes",
     *  description = "Update route, for moving etc."
     * )
     * @Rest\QueryParam(name="uri")
     */
    public function patchRoutesAction(ParamFetcher $paramFetcher)
    {
        /** @var DocumentManager $dm */
        $dm = $this->get('doctrine_phpcr.odm.document_manager');

        /** @var Request $request */
        $request = $this->get('request');

        if (! $paramFetcher->get('uri')) {
            throw new BadRequestHttpException();
        }

        /** @var Route $route */
        $route = $dm->find($this->className, $this->idPrefix . $paramFetcher->get('uri'));

        if (!$route) {
            throw new ResourceNotFoundException(sprintf("Could not find route with path %s", $paramFetcher->get('uri')));
        }

        // Move document to different path
        if ($request->request->get('targetPath')) {
            $dm->move($route, $this->idPrefix . '/' . ltrim($request->request->get('targetPath'), '/'));
        }

        if ($request->request->get('name')) {
            $route->setName($request->request->get('name'));
        }

        $dm->flush();
        $dm->refresh($route);

        return $route;
    }
} 