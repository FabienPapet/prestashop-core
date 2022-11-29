<?php

namespace PrestaShop\Customization;

use PrestaShop\Decimal\DecimalNumber;

interface CustomizationPriceProviderInterface
{
    public function getCustomizationPrice(int $idCustomization): DecimalNumber;
}
