<?php

namespace Tests\PrestaShop;

use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use PrestaShop\Bundle\CoreBundle\CoreBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;

class KernelTest extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles(): array
    {
        return [
            new FrameworkBundle(),
            new DoctrineBundle(),
            new CoreBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(function (ContainerBuilder $container) {
            $container->loadFromExtension('framework', [
                'test' => true,
            ]);
            $container->loadFromExtension('doctrine', [
                'dbal' => [
                    'default_connection' => 'default',
                    'connections' => [
                        'default' => [
                            'host' => '127.0.0.1',
                            'port' => null,
                            'dbname' => 'prestashop',
                            'user' => 'root',
                            'password' => 'prestashop',
                        ]
                    ],
                ],
            ]);
            $container->loadFromExtension('prestashop_core', [
                'database_prefix' => 'ps_',
            ]);
        });
    }
}
