<?php

/*
 * This file is part of the colinodell\omnipay-bundle package.
 *
 * (c) 2018 Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ColinODell\OmnipayBundle\DependencyInjection;

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
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        // $treeBuilder = new TreeBuilder();
        // $rootNode = $treeBuilder->root('omnipay');
        $treeBuilder = new TreeBuilder('omnipay');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->arrayNode('methods')
            ->useAttributeAsKey('name')
            ->prototype('variable')
            ->end()
            ->end()
            ->scalarNode('default_gateway')
            ->defaultNull()
            ->end()
            ->booleanNode('initialize_gateway_on_registration')
            ->defaultFalse()
            ->end()
            ->arrayNode('disabled_gateways')
            ->prototype('scalar')
            ->end()
            ->end();

        return $treeBuilder;
    }
}
