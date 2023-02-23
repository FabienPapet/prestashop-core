<?php

namespace Tests\PrestaShop\Domain\Currency;

use PHPUnit\Framework\TestCase;
use PrestaShop\Domain\Currency\Configuration\CurrencyConfigurationInterface;
use PrestaShop\Domain\Currency\DefaultCurrencyProvider;
use PrestaShop\Domain\Currency\Exception\CurrencyNotFoundException;
use Tests\PrestaShop\Domain\Currency\Mock\MockCurrencyConfiguration;
use Tests\PrestaShop\Domain\Currency\Mock\MockCurrencyRepository;

class DefaultCurrencyProviderTest extends TestCase
{
    public function testDefaultCurrency(): void
    {
        $provider = new DefaultCurrencyProvider(
            new MockCurrencyConfiguration(),
            new MockCurrencyRepository()
        );

        $currency = $provider->getDefaultCurrency();

        self::assertSame(1, $currency->getId());
        self::assertSame('eur', $currency->getIsoCode());
    }

    public function testGetDefaultCurrencyThrowsException(): void
    {
        $provider = new DefaultCurrencyProvider(
            new class implements CurrencyConfigurationInterface {
                public function getDefaultCurrencyId(): int
                {
                    return 42;
                }

                public function getDefaultCurrencyLangId(): int
                {
                    return 1;
                }
            },
            new MockCurrencyRepository()
        );


        $this->expectException(CurrencyNotFoundException::class);
        $provider->getDefaultCurrency();
    }

    public function testDefaultCurrencyId(): void
    {
        $provider = new DefaultCurrencyProvider(
            new MockCurrencyConfiguration(),
            new MockCurrencyRepository()
        );

        self::assertSame(1, $provider->getDefaultCurrencyId());
    }

    public function testDefaultCurrencyIsoCode(): void
    {
        $provider = new DefaultCurrencyProvider(
            new MockCurrencyConfiguration(),
            new MockCurrencyRepository()
        );

        self::assertSame('eur', $provider->getDefaultCurrencyIsoCode());
    }
}
