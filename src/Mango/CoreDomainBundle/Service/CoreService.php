<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 10/04/14
 * Time: 17:21
 */

namespace Mango\CoreDomainBundle\Service;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CoreService
 * @package Mango\CoreDomainBundle\Service
 */
abstract class CoreService
{
    /**
     * Processes a form based of a request.
     *
     * @param FormTypeInterface $formType
     * @param $model
     * @param Request $request
     * @return FormInterface
     */
    protected function processForm(FormTypeInterface $formType, $model, Request $request)
    {
        $form = $this->formFactory->create($formType, $model);
        $data = $request->request->get($form->getName()) ?: $request->request->all();

        if (is_array($data)) {
            $data = array_intersect_key($data, $form->all());
        }

        $form->submit($data);

        return $form;
    }
} 