<?php

namespace PrestaShop\CartRule\Condition;

interface ConditionInterface
{
    public function isValidatedBy(): string;

    public function getMessage(): string;
}
