<?php

declare(strict_types=1);

namespace PrestaShop\CartRule\Condition\Validation;

use DateTimeImmutable;
use PrestaShop\CartRule\Model\CartRuleInterface;

class CartRuleValidationContext
{
    private array $errors = [];

    public function __construct(private readonly CartRuleInterface $cartRule, private readonly DateTimeImmutable $date)
    {
    }

    public function getCartRule(): CartRuleInterface
    {
        return $this->cartRule;
    }

    public function addFailedCondition(string $message): void
    {
        $this->errors[] = $message;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function getDate(): DateTimeImmutable
    {
        return $this->date;
    }
}
