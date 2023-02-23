<?php

use PrestaShop\Bundle\CoreBundle\Repository\AbstractRepository;
use PrestaShop\Bundle\CoreBundle\Repository\Currency\CurrencyRepository;
use PrestaShop\Bundle\CoreBundle\Repository\Shop\ShopRepository;
use PrestaShop\Domain\Currency\Configuration\CurrencyConfigurationInterface;
use PrestaShop\Domain\Currency\DefaultCurrencyProvider;
use PrestaShop\Domain\Currency\DefaultCurrencyProviderInterface;
use PrestaShop\Domain\Currency\Repository\CurrencyRepositoryInterface;
use PrestaShop\Domain\Shop\Repository\ShopRepositoryInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Tests\PrestaShop\Currency\Mock\MockCurrencyConfiguration;
use function Symfony\Component\DependencyInjection\Loader\Configurator\param;

return static function (ContainerConfigurator $configurator) {
    $services = $configurator->services()
        ->defaults()
        ->autowire()      // Automatically injects dependencies in your services.
        ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
    ;

    $services
        ->instanceof(AbstractRepository::class)
        ->bind('$databasePrefix', param('prestashop_core.database_prefix'))
    ;

    $services
        ->set(CurrencyRepositoryInterface::class, CurrencyRepository::class)
        ->set(ShopRepositoryInterface::class, ShopRepository::class)
        ->public()
        ->set(CurrencyConfigurationInterface::class, MockCurrencyConfiguration::class)
        ->set(DefaultCurrencyProviderInterface::class, DefaultCurrencyProvider::class)
        ->public()
    ;

};
