<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:40
 */

namespace Mango\API\RestBundle\Component\ActionHandler;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\UnitOfWork;
use FOS\RestBundle\Request\ParamFetcherInterface;
use FOS\RestBundle\View\View;
use Mango\API\RestBundle\Component\ActionHandler\Data\ResultFetcher;
use
    Mango\API\RestBundle\Component\ActionHandler\Query\ParamQueryExtractor;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Acl\Exception\InvalidDomainObjectException;

/**
 * Class ActionHandler
 * @package Mango\API\ActionHandlerBundle
 */
class ActionHandler implements ActionHandlerInterface, ContainerAwareInterface
{
    protected $resultFetcher;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ResultFetcher $resultFetcher
     */
    public function __construct(ResultFetcher $resultFetcher)
    {
        $this->resultFetcher = $resultFetcher;
    }

    /**
     * @param $entity
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function find($entity, ParamFetcherInterface $paramFetcher = null)
    {
        $extractor = new ParamQueryExtractor();
        $query = $extractor->extract($paramFetcher);
        return $this->resultFetcher->find($entity, $query);
    }

    /**
     * @param $entity
     * @param array $identifier
     * @return mixed
     */
    public function findOne($entity, $identifier = null)
    {
        return $this->resultFetcher->findOne($entity, $identifier);
    }

    /**
     * {@inheritdoc}
     */
    public function update(FormTypeInterface $formType, $entity, $persist = true)
    {
        return $this->processForm($formType, $entity, $persist);
    }

    /**
     * {@inheritdoc}
     */
    public function insert(FormTypeInterface $formType, $entity, $persist = true)
    {
        return $this->processForm($formType, $entity, $persist);
    }

    /**
     * @return mixed
     */
    public function delete()
    {
        // TODO: Implement delete() method.
    }

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * @param FormTypeInterface $formType
     * @param $entity
     * @param bool $persist
     * @throws \Symfony\Component\Routing\Exception\ResourceNotFoundException
     * @return FormInterface|Response
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
        if (UnitOfWork::STATE_NEW === $em->getUnitOfWork()->getEntityState($entity)) {
            $statusCode = 201;
        }

        /** @var Request $request */
        $request = $this->container->get('request');

        /** @var Form $form */
        $form = $this->createForm($formType, $entity);

        $data = $request->request->all();
        $data = array_intersect_key($data, $form->all());
        $form->handleRequest($request);

        if ($form->isValid() && $persist === true) {
            $em->persist($entity);
            $em->flush();
            $em->refresh($entity);

            $response = new Response();
            $response->setStatusCode($statusCode);

            /** @var RouterInterface $router */
            $router = $this->container->get('router');

            return View::create($entity, $statusCode, array(
                "Location" => $router->generate("get_user", array("id" => $entity->getId()), true)
            ));
        }

        return $form;
    }

    /**
     * @param FormTypeInterface $type
     * @param null $data
     * @param array $options
     * @return FormInterface
     */
    protected function createForm(FormTypeInterface $type, $data = null, array $options = array())
    {
        return $this->container->get('form.factory')->create($type, $data, $options);
    }
}