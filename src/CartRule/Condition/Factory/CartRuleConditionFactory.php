<?php

namespace PrestaShop\CartRule\Condition\Factory;

use PrestaShop\CartRule\Action\ActionInterface;
use PrestaShop\CartRule\Action\AddProductAsGift;
use PrestaShop\CartRule\Action\ApplyOrderReductionAmount;
use PrestaShop\CartRule\Action\ApplyOrderReductionPercent;
use PrestaShop\CartRule\Action\ApplyProductReductionAmount;
use PrestaShop\CartRule\Action\EnableFreeShipping;
use PrestaShop\CartRule\Condition\CartMinimalAmount;
use PrestaShop\CartRule\Condition\CartRuleBasicFields;
use PrestaShop\CartRule\Condition\Condition;
use PrestaShop\CartRule\Model\CartRuleInterface;

class CartRuleConditionFactory
{
    /**
     * @return Condition[]
     */
    public function buildConditions(CartRuleInterface $cartRule): array
    {
        $conditions = [new CartRuleBasicFields()];

        if ($cartRule->getMinimumAmount()->isGreaterThanZero()) {
            $conditions[] = new CartMinimalAmount(
                $cartRule->getMinimumAmount(),
                $cartRule->getMinimumAmountTax(),
                $cartRule->getMinimumAmountShipping(),
                $cartRule->getMinimumAmountCurrency(),
            );
        }

        return $conditions;
    }

    /**
     * @return ActionInterface[]
     */
    public function buildActions(CartRuleInterface $cartRule): array
    {
        $actions = [];

        if ($cartRule->enablesFreeShipping()) {
            $actions[] = new EnableFreeShipping();
        }

        if (
            $cartRule->getReductionAmount()) {
            if ($cartRule->getReductionProduct()) {
                $actions[] = new ApplyProductReductionAmount(
                    $cartRule->getReductionAmount(),
                    $cartRule->getReductionCurrency(),
                    $cartRule->getReductionTax(),
                    $cartRule->getReductionProduct()
                );
            } else {
                $actions[] = new ApplyOrderReductionAmount(
                    $cartRule->getReductionAmount(),
                    $cartRule->getReductionCurrency(),
                    $cartRule->getReductionTax()
                );
            }
        }

        if ($cartRule->getReductionPercent() > 0) {
            $actions[] = new ApplyOrderReductionPercent($cartRule->getReductionPercent(), $cartRule->getReductionExcludeSpecial());
        }

        if ($cartRule->isGiftProduct()) {
            $actions[] = new AddProductAsGift($cartRule->getGiftProductAttribute());
        }

        return $actions;
    }
}
