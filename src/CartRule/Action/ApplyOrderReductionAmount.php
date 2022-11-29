<?php

namespace PrestaShop\CartRule\Action;

use PrestaShop\Currency\Model\CurrencyInterface;

/**
 * Apply reduction to the whole order, this does not take care about transportation fees.
 */
class ApplyOrderReductionAmount implements ActionInterface
{
    public function __construct(
        private readonly float $amount,
        private readonly CurrencyInterface $currency,
        private readonly bool $includeTaxes
    ) {
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
}
