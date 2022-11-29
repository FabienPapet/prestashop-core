<?php

namespace PrestaShop\CartRule\Condition;

abstract class Condition implements ConditionInterface
{
    public function isValidatedBy(): string
    {
        return static::class . 'ConditionValidator';
    }

    public function getMessage(): string
    {
        return static::class;
    }
}
