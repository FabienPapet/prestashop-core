<?php

namespace Tests\PrestaShop;

use PrestaShop\Bundle\CartRuleBundle\CartRuleBundle;
use PrestaShop\Bundle\CoreBundle\CoreBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Routing\RouteCollectionBuilder;

class KernelTest extends Kernel
{
    use MicroKernelTrait;

    public function registerBundles(): array
    {
        return [
            new FrameworkBundle(),
            new CoreBundle(),
        ];
    }

    public function registerContainerConfiguration(LoaderInterface $loader): void
    {
        $loader->load(function (ContainerBuilder $container) {
            $container->loadFromExtension('framework', [
                'test' => true,
            ]);
        });
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        // TODO: Implement configureRoutes() method.
    }

    protected function configureContainer(ContainerBuilder $container, LoaderInterface $loader)
    {
        // TODO: Implement configureContainer() method.
    }
}
