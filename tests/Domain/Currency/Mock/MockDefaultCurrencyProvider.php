<?php

namespace Tests\PrestaShop\Domain\Currency\Mock;

use PrestaShop\Domain\Currency\DefaultCurrencyProviderInterface;
use PrestaShop\Domain\Currency\Model\Currency;
use PrestaShop\Domain\Currency\Model\CurrencyInterface;

class MockDefaultCurrencyProvider implements DefaultCurrencyProviderInterface
{
    public function __construct(private readonly Currency $currency)
    {
    }

    public function getDefaultCurrency(): CurrencyInterface
    {
        return $this->currency;
    }

    public function getDefaultCurrencyId(): int
    {
        return $this->currency->getId();
    }

    public function getDefaultCurrencyIsoCode(): string
    {
        return $this->currency->getIsoCode();
    }
}

