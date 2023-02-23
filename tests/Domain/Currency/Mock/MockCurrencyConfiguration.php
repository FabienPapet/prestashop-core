<?php

namespace Tests\PrestaShop\Domain\Currency\Mock;

use PrestaShop\Domain\Currency\Configuration\CurrencyConfigurationInterface;

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

