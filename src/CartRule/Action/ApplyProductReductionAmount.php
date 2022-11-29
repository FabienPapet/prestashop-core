<?php

namespace PrestaShop\CartRule\Action;

use PrestaShop\Currency\Model\CurrencyInterface;

class ApplyProductReductionAmount implements ActionInterface
{
    public function __construct(private readonly float $amount, private readonly CurrencyInterface $currency, private readonly bool $includeTaxes, private readonly int $productId)
    {
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getCurrency(): CurrencyInterface
    {
        return $this->currency;
    }

    public function isIncludeTaxes(): bool
    {
        return $this->includeTaxes;
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}
