<?php

namespace Tests\PrestaShop\Currency\Mock;

use PrestaShop\Currency\Model\Currency;
use PrestaShop\Currency\Model\CurrencyInterface;

class MockCurrency
{
    public static function eur(): CurrencyInterface
    {
        return new Currency(1, 'euro', 'eur' , 1.0, '€', 2, true);
    }

    public static function usd(): CurrencyInterface
    {
        return new Currency(2, 'dollar', 'usd', 0.75, '$', 2, true);
    }

    public static function php(): CurrencyInterface
    {
        return new Currency(3, 'philipan pesos', 'php', 0.5, '$PHP', 2, true);
    }
}

