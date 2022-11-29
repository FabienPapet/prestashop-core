<?php

namespace PrestaShop\CartRule\Condition;

use PrestaShop\CartRule\Condition\Validation\CartRuleValidationContext;
use PrestaShop\CartRule\Condition\Validation\ConditionValidatorInterface;

class CartRuleBasicsFieldsConditionValidator implements ConditionValidatorInterface
{
    public function validate(ConditionInterface $condition, CartRuleValidationContext $context): void
    {
        $date = $context->getDate();

        $cartRule = $context->getCartRule();

        if ($cartRule->getQuantity() <= 0) {
            $context->addFailedCondition('This cart rule is no more available');
        }

        if ($cartRule->getDateFrom() > $date || $cartRule->getDateTo() < $date) {
            $context->addFailedCondition('Invalid period');
        }

        if (!$cartRule->isActive()) {
            $context->addFailedCondition('Cart rule is inactive');
        }
    }
}
