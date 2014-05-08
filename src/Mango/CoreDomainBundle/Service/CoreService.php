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
        $data = $request->request->get($formType->getName()) ?: $request->request->all();

        // Check if $data is associative or not, if it is, make is so.
        if ($this->isAssoc($data)) {
            $data = array($data);
        }

        $forms = array();
        foreach ($data as $item) {
            $form = $this->formFactory->create($formType, $model);
            $forms[] = $form;

            if (is_array($item)) {
                $item = array_intersect_key($item, $form->all());
            }

            // Only submit form data if we use one of the following HTTP verbs.
            if (in_array($request->getMethod(), array("POST", "PUT", "PATCH"))) {
                // $clearMissing needs to be false, is belangrijk..
                $form->submit($item);
            }
        }

        return reset($forms);
    }

    protected function isAssoc($array) {
        return (bool)count(array_filter(array_keys($array), 'is_string'));
    }
} 