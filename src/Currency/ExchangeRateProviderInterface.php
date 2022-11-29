<?php

declare(strict_types=1);

namespace PrestaShop\Currency;

use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Decimal\DecimalNumber;

interface ExchangeRateProviderInterface
{
    public function getExchangeRate(CurrencyInterface $from, CurrencyInterface $to): DecimalNumber;
}
