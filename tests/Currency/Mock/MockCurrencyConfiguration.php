<?php

namespace Tests\PrestaShop\Currency\Mock;

use PrestaShop\Currency\Configuration\CurrencyConfigurationInterface;

class MockCurrencyConfiguration implements CurrencyConfigurationInterface
{
    public function getDefaultCurrencyId(): int
    {
        return 1;
    }

    public function getDefaultCurrencyLangId(): int
    {
        return 1;
    }
}

