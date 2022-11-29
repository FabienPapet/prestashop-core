<?php

namespace PrestaShop\CartRule\Condition;

use PrestaShop\Cart\Model\CartInterface;

class CartMinimalAmountConditionValidator extends Condition
{
    /**
     * @param CartMinimalAmount $condition
     * @param CartInterface $order
     */
    public function validate(ConditionInterface $condition, CartInterface $order): bool
    {
        if ($condition->isIncludeTaxes()) {
            $total = $order->getTotal();
        } else {
            $total = $order->getTotalWithoutTaxes();
        }

        return $total > $condition->getAmount();
    }
}
