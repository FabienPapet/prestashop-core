<?php

namespace PrestaShop\Price;

use PrestaShop\Currency\DefaultCurrencyProviderInterface;
use PrestaShop\Customization\CustomizationPriceProviderInterface;
use PrestaShop\Decimal\DecimalNumber;
use PrestaShop\Price\Query\GetPriceForProductAttribute;
use PrestaShop\Product\Repository\ProductAttributeRepositoryInterface;

class PriceProvider
{
    public function __construct(
        private readonly ProductAttributeRepositoryInterface $productAttributeRepository,
        private readonly CustomizationPriceProviderInterface $customizationPriceProvider,
    ) {
    }

    public function getCustomizationPrice(int $customizationId): DecimalNumber
    {
        return $this->customizationPriceProvider->getCustomizationPrice($customizationId);
    }

    public function getPriceForProductAttribute(GetPriceForProductAttribute $query): float
    {
        $product = $this->productAttributeRepository->getProductAttribute(
            $query->getProductAttributeId()
        );

        $unitPrice = new DecimalNumber((string) $product->getPrice());
        $price = $unitPrice->times(new DecimalNumber((string) $query->getQuantity()));

        if (null !== $query->getCustomizationId()) {
            $price = $price->plus($this->getCustomizationPrice($query->getCustomizationId()));
        }

        if ($price->isLowerThanZero() && $query->allowNegativePrices()) {
            return 0.0;
        }

        return (float) $price->toPrecision(2);
    }
}
