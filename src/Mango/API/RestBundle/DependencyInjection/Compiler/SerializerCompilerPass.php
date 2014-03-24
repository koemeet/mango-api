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
        // We want to use our JSON API spec serializer when serializing JSON
        $container->setParameter('hateoas.serializer.json_hal.class', 'Mango\\API\\RestBundle\\Serializer\\JsonApiSerializer');
    }

} 