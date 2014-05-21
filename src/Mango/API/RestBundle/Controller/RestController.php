<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 26/03/14
 * Time: 15:44
 */

namespace Mango\API\RestBundle\Controller;

use Doctrine\ORM\UnitOfWork;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandler;
use Mango\API\RestBundle\Request\ParamFetcher\QueryExtractor;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

/**
 * Class RestController
 * @package Mango\API\RestBundle\Controller
 */
class RestController extends FOSRestController
{
    /**
     * @var QueryExtractor
     */
    protected $queryExtractor;

    /**
     * Initialize controller
     */
    protected function init() {}

    /**
     * Set container.
     *
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
        $this->queryExtractor = $this->get('mango_api_rest.query_extractor');
        $this->init();
    }

    /**
     * Shortcut for extracting a query from a paramfetcher instance.
     *
     * @param ParamFetcherInterface $paramFetcher
     * @return \Mango\CoreDomain\Persistence\Query
     */
    public function extract(ParamFetcherInterface $paramFetcher)
    {
        return $this->queryExtractor->extract($paramFetcher);
    }

    /**
     * @param FormInterface $form
     * @param               $route
     * @return View
     */
    protected function createCreatedView(FormInterface $form, $route)
    {
        return $this->createView($form, Codes::HTTP_CREATED, $route);
    }

    /**
     * @param FormInterface $form
     * @param               $statusCode
     * @param null          $route
     * @internal param null $locationRoute
     * @return View
     */
    public function createView(FormInterface $form, $statusCode, $route = null)
    {
        $data = array($form->getName() => $form->getViewData());

        if ($route !== null
            && null !== $form->getData()->getId()) {
            $view = $this->routeRedirectView($route, array('id' => $form->getData()->getId()));
        } else {
            $view = View::create(null, $statusCode);
        }

        $view->setData($data);

        return $view;
    }

    /**
     * Generate new view
     *
     * @param $form
     * @param $route
     * @return View
     * @throws \Exception
     */
    protected function generateNewView($form, $route)
    {
        if (!$form instanceof FormInterface) {
            return $form;
        }

        $view = View::create(array('form' => $form->createView(), 'route' => $route));
        $view->setFormat('html');
        $view->setTemplate('MangoAPIRestBundle::new.html.twig');

        return $view;
    }
}