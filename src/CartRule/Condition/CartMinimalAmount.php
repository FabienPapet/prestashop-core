<?php

namespace PrestaShop\CartRule\Condition;

use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Decimal\DecimalNumber;

class CartMinimalAmount extends Condition
{
    public function __construct(private readonly DecimalNumber $amount, private readonly bool $includeTaxes, private readonly bool $includeTransport, private readonly CurrencyInterface $currency)
    {
    }

    public function getAmount(): DecimalNumber
    {
        return $this->amount;
    }

    public function includeTaxes(): bool
    {
        return $this->includeTaxes;
    }

    public function getCurrency(): CurrencyInterface
    {
        return $this->currency;
    }

    public function includeTransport(): bool
    {
        return $this->includeTransport;
    }
}
