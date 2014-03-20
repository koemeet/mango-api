<?php

namespace Mango\API\RestBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('mango_api_rest');

        $rootNode->children()
            ->arrayNode('action_handler')
                ->children()
                    ->arrayNode('param_mapping')
                        ->children()
                            ->scalarNode('limit')
                                ->defaultValue('limit')
                            ->end()
                            ->scalarNode('page')
                                ->defaultValue('page')
                            ->end()
                            ->scalarNode('orderBy')
                                ->defaultValue('orderBy')
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
