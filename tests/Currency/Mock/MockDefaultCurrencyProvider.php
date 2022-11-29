<?php

namespace Tests\PrestaShop\Currency\Mock;

use PrestaShop\Currency\DefaultCurrencyProviderInterface;
use PrestaShop\Currency\Model\Currency;
use PrestaShop\Currency\Model\CurrencyInterface;

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

