<?php

namespace Symfony\Cmf\Bundle\MediaBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class EditorsCompilerPass implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $tags = $container->findTaggedServiceIds('cmf_media.upload_editor_helper');

        if (count($tags) > 0) {
            if ($container->has('cmf_media.upload_file_helper')) {
                $manager = $container->findDefinition('cmf_media.upload_file_helper');

                foreach ($tags as $id => $tag) {
                    $manager->addMethodCall('addEditorHelper', array($tag[0]['alias'], new Reference($id)));
                }
            }

            if ($container->has('cmf_media.upload_image_helper')) {
                $manager = $container->findDefinition('cmf_media.upload_image_helper');

                foreach ($tags as $id => $tag) {
                    $manager->addMethodCall('addEditorHelper', array($tag[0]['alias'], new Reference($id)));
                }
            }
        }

        $tags = $container->findTaggedServiceIds('cmf_media.browser_file_helper');

        if (count($tags) > 0) {
            if ($container->has('cmf_media.browser_file_helper')) {
                $manager = $container->findDefinition('cmf_media.browser_file_helper');

                foreach ($tags as $id => $tag) {
                    $manager->addMethodCall('addEditorHelper', array($tag[0]['editor'], $tag[0]['browser'], new Reference($id)));
                }
            }
        }
    }
}
