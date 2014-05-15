<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 28/03/14
 * Time: 16:32
 */

namespace Mango\API\RestBundle\Serializer\Form;

use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\YamlSerializationVisitor;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\GenericSerializationVisitor;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormError;
use Symfony\Component\Translation\TranslatorInterface;
use JMS\Serializer\XmlSerializationVisitor;

/**
 * Class FormErrorHandler
 * @package Mango\API\RestBundle\Serializer\Form
 */
class FormErrorHandler implements SubscribingHandlerInterface
{
    private $translator;

    public static function getSubscribingMethods()
    {
        $methods = array();
        foreach (array('xml', 'json', 'yml') as $format) {
            $methods[] = array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'type' => 'Symfony\Component\Form\Form',
                'format' => $format,
            );
            $methods[] = array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'type' => 'Symfony\Component\Form\FormError',
                'format' => $format,
            );
        }

        return $methods;
    }

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function serializeFormToXml(XmlSerializationVisitor $visitor, Form $form, array $type)
    {
        if (null === $visitor->document) {
            $visitor->document = $visitor->createDocument(null, null, false);
            $visitor->document->appendChild($formNode = $visitor->document->createElement('form'));
            $visitor->setCurrentNode($formNode);
        } else {
            $visitor->getCurrentNode()->appendChild(
                $formNode = $visitor->document->createElement('form')
            );
        }

        $formNode->setAttribute('name', $form->getName());

        $formNode->appendChild($errorsNode = $visitor->document->createElement('errors'));
        foreach ($form->getErrors() as $error) {
            $errorNode = $visitor->document->createElement('entry');
            $errorNode->appendChild($this->serializeFormErrorToXml($visitor, $error, array()));
            $errorsNode->appendChild($errorNode);
        }

        foreach ($form->all() as $child) {
            if ($child instanceof Form) {
                if (null !== $node = $this->serializeFormToXml($visitor, $child, array())) {
                    $formNode->appendChild($node);
                }
            }
        }

        return $formNode;
    }

    public function serializeFormToJson(JsonSerializationVisitor $visitor, Form $form, array $type)
    {
        return $this->convertFormToArray($visitor, $form);
    }

    public function serializeFormToYml(YamlSerializationVisitor $visitor, Form $form, array $type)
    {
        return $this->convertFormToArray($visitor, $form);
    }

    public function serializeFormErrorToXml(XmlSerializationVisitor $visitor, FormError $formError, array $type)
    {
        if (null === $visitor->document) {
            $visitor->document = $visitor->createDocument(null, null, true);
        }

        return $visitor->document->createCDATASection($this->getErrorMessage($formError));
    }

    public function serializeFormErrorToJson(JsonSerializationVisitor $visitor, FormError $formError, array $type)
    {
        return $this->getErrorMessage($formError);
    }

    public function serializeFormErrorToYml(YamlSerializationVisitor $visitor, FormError $formError, array $type)
    {
        return $this->getErrorMessage($formError);
    }

    private function getErrorMessage(FormError $error)
    {
        if (null !== $error->getMessagePluralization()) {
            return $this->translator->transChoice($error->getMessageTemplate(), $error->getMessagePluralization(), $error->getMessageParameters(), 'validators');
        }

        return $this->translator->trans($error->getMessageTemplate(), $error->getMessageParameters(), 'validators');
    }

    private function convertFormToArray(GenericSerializationVisitor $visitor, Form $data)
    {
        $isRoot = null === $visitor->getRoot();

        $form = $errors = array();
        foreach ($data->getErrors() as $error) {
            //$errors[] = $this->getErrorMessage($error);
            $errors = $this->getErrorMessage($error);
        }

        if ($errors) {
            $form = $errors;
        }

        $children = array();
        foreach ($data->all() as $child) {
            if ($child instanceof Form && !$child->isValid()) {
                $children[$child->getName()] = $this->convertFormToArray($visitor, $child);
            }
        }

        if ($children) {
            $form = $children;
        }

        if ($isRoot) {
            $visitor->setRoot($form);
        }

        return $form;
    }
} 