<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 02/05/14
 * Time: 15:37
 */

namespace Mango\API\RestBundle\Serializer\Handler;


use JMS\Serializer\Context;
use JMS\Serializer\GraphNavigator;
use JMS\Serializer\Handler\SubscribingHandlerInterface;
use JMS\Serializer\JsonSerializationVisitor;
use JMS\Serializer\SerializationContext;
use JMS\Serializer\VisitorInterface;
use Mango\API\RestBundle\Serializer\View;

class ViewHandler implements SubscribingHandlerInterface
{
    /**
     * @return array
     */
    public static function getSubscribingMethods()
    {
        $methods = array();
        $formats = array('json');

        foreach ($formats as $format) {
            $methods[] = array(
                'direction' => GraphNavigator::DIRECTION_SERIALIZATION,
                'type' => 'Mango\API\RestBundle\Serializer\View',
                'format' => $format,
                'method' => 'serializeArrayObject',
            );
        }

        return $methods;
    }

    /**
     * @param VisitorInterface $visitor
     * @param View $data
     * @param array $type
     * @param Context $context
     * @return mixed
     */
    public function serializeArrayObject(JsonSerializationVisitor $visitor, View $data, array $type, SerializationContext $context)
    {
        // Hey G, come, lets serialize die DATA G, we gaan onze eiguh weg.
        $serializedData = $context->accept($data->getData());

        $context->stopVisiting($data);


        echo '<pre>';
        print_r($visitor->getRoot());
        die;
    }
} 