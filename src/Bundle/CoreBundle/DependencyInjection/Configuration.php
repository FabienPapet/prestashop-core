<?php

namespace PrestaShop\Bundle\CoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $tree = new TreeBuilder('prestashop_core');
        /** @phpstan-ignore-next-line */
        $tree->getRootNode()
            ->children()
                ->scalarNode('database_prefix')->isRequired()->end()
            ->end()
        ;

        return $tree;
    }
}
