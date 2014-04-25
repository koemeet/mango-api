<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 17:21
 */

namespace Mango\CoreDomainBundle\Service;

use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CoreService
 * @package Mango\CoreDomainBundle\Service
 */
abstract class CoreService
{
    protected $formFactory;

    /**
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * Processes a form based of a request.
     *
     * @param FormTypeInterface $formType
     * @param $model
     * @param Request $request
     * @return FormInterface
     */
    public function processForm(FormTypeInterface $formType, $model, Request $request)
    {
        $form = $this->formFactory->create($formType, $model);
        $data = $request->request->get($form->getName()) ?: $request->request->all();

        if (is_array($data)) {
            $data = array_intersect_key($data, $form->all());
        }

        // Only submit form data if we use one of the following HTTP verbs.
        if (in_array($request->getMethod(), array("POST", "PUT", "PATCH"))) {
            // $clearMissing needs to be false, is belangrijk..
            $form->submit($data);
        }

        return $form;
    }
} 