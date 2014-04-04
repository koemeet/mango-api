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
use FOS\RestBundle\View\View;
use Mango\API\RestBundle\Component\ActionHandler\ActionHandler;
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
     * @return ActionHandler
     */
    public function getActionHandler()
    {
        return $this->get('mango_api_rest.action_handler');
    }

    /**
     * @param FormTypeInterface $formType
     * @param $entity
     * @param bool $persist
     * @return Form
     * @throws ResourceNotFoundException
     */
    protected function processForm(FormTypeInterface $formType, $entity, $persist = true)
    {
        if (!$entity) {
            throw new ResourceNotFoundException("Could not find resource.");
        }

        /** @var EntityManager $em */
        $em = $this->container->get('doctrine.orm.entity_manager');

        $statusCode = 200;

        // We are dealing with a new entity
        // TODO: Create an universal solution for this, now it's tight to Doctrine
        if (UnitOfWork::STATE_NEW === $em->getUnitOfWork()->getEntityState($entity)) {
            $statusCode = 201;
        }

        /** @var Request $request */
        $request = $this->get('request');

        /** @var Form $form */
        $form = $this->createForm($formType, $entity);
        $data = $request->request->get($form->getName()) ?: $request->request->all();

        if (is_array($data)) {
            // Filter out data that does not conform this form type
            $data = array_intersect_key($data, $form->all());
        }

        // Only submit the data when we have an idempotent resource action
        if (in_array($request->getMethod(), array("POST", "PATCH", "PUT"))) {
            $form->submit($data);
        }

        if ($form->isValid() && $persist === true) {
            $em->persist($entity);
            $em->flush();
            $em->refresh($entity);

            $response = new Response();
            $response->setStatusCode($statusCode);

            /** @var RouterInterface $router */
            $router = $this->container->get('router');

            return View::create(array($form->getName() => $entity), $statusCode, array(
                "Location" => $router->generate("get_user", array("id" => $entity->getId()), true)
            ));
        }

        return $form;
    }
}