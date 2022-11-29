<?php

namespace PrestaShop\CartRule\Condition\Validation;

use PrestaShop\CartRule\Condition\ConditionInterface;

interface ConditionValidatorInterface
{
    public function validate(ConditionInterface $condition, CartRuleValidationContext $context): void;
}
