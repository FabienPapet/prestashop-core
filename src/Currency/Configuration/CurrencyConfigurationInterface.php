<?php

namespace PrestaShop\Currency\Configuration;

interface CurrencyConfigurationInterface
{
    public function getDefaultCurrencyId(): int;

    public function getDefaultCurrencyLangId(): int;
}
