<?php

namespace Tests\PrestaShop\Domain\Currency\Mock;

use PrestaShop\Domain\Currency\Exception\CurrencyNotFoundException;
use PrestaShop\Domain\Currency\Model\CurrencyInterface;
use PrestaShop\Domain\Currency\Repository\CurrencyRepositoryInterface;

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

