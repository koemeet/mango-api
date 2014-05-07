<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16/03/14
 * Time: 22:02
 */

namespace Mango\API\RestBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class SerializerCompilerPass
 * @package Mango\API\RestBundle\DependencyInjection\Compiler
 */
class SerializerCompilerPass implements CompilerPassInterface
{
    /**
     * You can modify the container here before it is dumped to PHP code.
     *
     * @param ContainerBuilder $container
     *
     * @api
     */
    public function process(ContainerBuilder $container)
    {
        // Replace default links factory
        $container->getDefinition('hateoas.links_factory')->replaceArgument(1, new Reference('mango_api_rest.serializer.link_factory'));

        //$container->getDefinition('hateoas.event_subscriber.json.class')->replaceArgument(0, new Reference('mango_api_rest.serializer.link_factory'));
        $container->setParameter('jms_serializer.json_serialization_visitor.class', 'Mango\API\RestBundle\Serializer\Visitor\JsonSerializationVisitor');
        $container->setParameter('hateoas.serializer.json_hal.class', 'Mango\\API\\RestBundle\\Serializer\\JsonApiSerializer');

        //$container->setParameter('hateoas.event_subscriber.json.class', 'Mango\\API\\RestBundle\\Serializer\\EventSubscriber\\JsonApiSubscriber');
        $container->setParameter('jms_serializer.form_error_handler.class', 'Mango\\API\\RestBundle\\Serializer\\Form\\FormErrorHandler');
    }

} 