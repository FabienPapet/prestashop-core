<?php

declare(strict_types=1);

namespace PrestaShop\Domain\Currency;

use PrestaShop\Decimal\DecimalNumber;
use PrestaShop\Domain\Currency\Model\CurrencyInterface;

interface ExchangeRateProviderInterface
{
    public function getExchangeRate(CurrencyInterface $from, CurrencyInterface $to): DecimalNumber;
}
