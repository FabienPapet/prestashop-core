<?php

namespace PrestaShop\Product\Configuration;

class ProductConfiguration
{
    public function isCombinationFeatureActive(): bool
    {
        // PS_COMBINATION_FEATURE_ACTIVE
        return false;
    }

    public function isTaxActive(): bool
    {
        // PS_TAX
        return true;
    }

    public function isEcoTaxActive(): bool
    {
        // PS_TAX
        return true;
    }
}
