<?php

namespace PrestaShop\CartRule\Action;

/**
 * Apply reduction to the whole order, this does not take care about transportation fees.
 */
class ApplyOrderReductionPercent implements ActionInterface
{
    public function __construct(private readonly float $percent, private readonly bool $excludePromoProducts)
    {
    }

    public function getPercent(): float
    {
        return $this->percent;
    }

    public function excludePromoProducts(): bool
    {
        return $this->excludePromoProducts;
    }
}
