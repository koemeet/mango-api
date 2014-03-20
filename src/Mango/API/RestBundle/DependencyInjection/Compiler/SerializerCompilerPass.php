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
        // Replace the default json serializer from hateoas with ours.
        $container->getDefinition('hateoas.event_subscriber.json')->replaceArgument(0, new Reference('mango_api_rest.serializer.json_hal'));
    }

} 