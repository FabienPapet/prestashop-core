<?php

namespace Tests\PrestaShop\Currency\Mock;

use PrestaShop\Currency\Exception\CurrencyNotFoundException;
use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Currency\Repository\CurrencyRepositoryInterface;

class MockCurrencyRepository implements CurrencyRepositoryInterface
{
    public function getCurrencyById(int $currencyId, int $langId): CurrencyInterface
    {
        return match ($currencyId) {
            1 => MockCurrency::eur(),
            2 => MockCurrency::usd(),
            default => throw new CurrencyNotFoundException()
        };
    }

    public function getCurrencyByIsoCode(string $isoCode, int $langId): CurrencyInterface
    {
        return match ($isoCode) {
            'eur' => MockCurrency::eur(),
            'usd' => MockCurrency::usd(),
            default => throw new CurrencyNotFoundException()
        };
    }
}

