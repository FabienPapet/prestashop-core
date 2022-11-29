<?php

namespace PrestaShop\CartRule\Repository;

use DateTimeImmutable;

final class CartRuleQuery
{
    private ?int $customerId = null;
    private ?DateTimeImmutable $dateCondition = null;

    public function __construct(private readonly int $langId)
    {
    }

    public function validAtDate(DateTimeImmutable $date): self
    {
        $this->dateCondition = $date;

        return $this;
    }

    public function forCustomer(int $customerId): self
    {
        $this->customerId = $customerId;

        return $this;
    }

    public function getCustomerId(): ?int
    {
        return $this->customerId;
    }

    public function getDateCondition(): ?DateTimeImmutable
    {
        return $this->dateCondition;
    }

    public function getLangId(): int
    {
        return $this->langId;
    }
}
