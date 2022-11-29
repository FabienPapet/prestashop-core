<?php

namespace Tests\PrestaShop\CartRule;

use PrestaShop\CartRule\Model\OrderProductInterface;

class MockProduct implements OrderProductInterface
{
    public function __construct(private readonly int $id, private readonly float $unitPrice, private readonly float $quantity)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUnitPrice(): float
    {
        return $this->unitPrice;
    }

    public function getQuantity(): float
    {
        return $this->quantity;
    }
}
