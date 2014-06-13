<?php

namespace Mango\API\RestBundle;

use Mango\API\RestBundle\DependencyInjection\Compiler\SerializerCompilerPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MangoAPIRestBundle
 *
 * This bundle is used for serving resources in a restful way. It uses the MangoAPIDomainBundle to take care of the
 * domain related logic. It is totally independed on the persistance layer, it can work perfectly when repositories
 * for an other ORM like Propel are implemented in the CoreDomainBundle.
 *
 * @package Mango\API\RestBundle
 */
class MangoAPIRestBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new SerializerCompilerPass());
    }
}
