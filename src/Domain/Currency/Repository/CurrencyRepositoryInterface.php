<?php

namespace PrestaShop\Domain\Currency\Repository;

use PrestaShop\Domain\Currency\Model\CurrencyInterface;

interface CurrencyRepositoryInterface
{
    public function getCurrencyById(int $currencyId, int $langId): CurrencyInterface;
    public function getCurrencyByIsoCode(string $isoCode, int $langId): CurrencyInterface;
}
