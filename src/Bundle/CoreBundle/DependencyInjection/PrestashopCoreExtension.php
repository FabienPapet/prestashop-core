<?php

namespace PrestaShop\Bundle\CoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

class PrestashopCoreExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container): void
    {
        $loader = new PhpFileLoader($container, new FileLocator(dirname(__DIR__) . '/Resources/config'));
        $loader->load('services.php');

        $config = $this->processConfiguration(new Configuration(), $configs);
        $this->build($container, $config);
    }

    public function build(ContainerBuilder $container, array $config): void
    {
        $container->setParameter('prestashop_core.database_prefix', $config['database_prefix']);
    }
}
