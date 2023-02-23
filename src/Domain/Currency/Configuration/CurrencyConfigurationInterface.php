<?php

namespace PrestaShop\Domain\Currency\Configuration;

interface CurrencyConfigurationInterface
{
    public function getDefaultCurrencyId(ShopConstraint $constraint): int;
}
