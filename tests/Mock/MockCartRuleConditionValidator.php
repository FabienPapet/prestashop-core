<?php

namespace Tests\PrestaShop\Mock;

use PrestaShop\CartRule\Condition\ConditionInterface;
use PrestaShop\CartRule\Condition\Validation\CartRuleValidationContext;
use PrestaShop\CartRule\Condition\Validation\ConditionValidatorInterface;

class MockCartRuleConditionValidator implements ConditionValidatorInterface
{
    public function __construct(... $validators)
    {
        foreach ($validators as $validator) {

        }
    }

    public function validate(ConditionInterface $condition, CartRuleValidationContext $context): void
    {
        // TODO: Implement validate() method.
    }
}

