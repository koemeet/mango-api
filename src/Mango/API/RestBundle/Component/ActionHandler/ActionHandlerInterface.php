<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 13/03/14
 * Time: 22:41
 */

namespace Mango\API\RestBundle\Component\ActionHandler;

use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\Form\FormTypeInterface;

/**
 * Interface ActionHandlerInterface
 * @package Mango\API\ActionHandlerBundle
 */
interface ActionHandlerInterface
{
    /**
     * @param $entity
     * @param ParamFetcherInterface $paramFetcher
     * @return mixed
     */
    public function find($entity, ParamFetcherInterface $paramFetcher = null);

    /**
     * @param $entity
     * @param array $identifier
     * @return mixed
     */
    public function findOne($entity, $identifier = null);

    /**
     * @param FormTypeInterface $formType
     * @param $entity
     * @param bool $persist
     * @return FormInterface
     */
    public function update(FormTypeInterface $formType, $entity, $persist = true);

    /**
     * @param FormTypeInterface $formType
     * @param $entity
     * @param bool $persist
     * @return FormInterface
     */
    public function insert(FormTypeInterface $formType, $entity, $persist = true);

    /**
     * @return mixed
     */
    public function delete();
} 