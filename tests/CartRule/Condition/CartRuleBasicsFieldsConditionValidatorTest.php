<?php

namespace Tests\PrestaShop\CartRule\Condition;

use DateTimeImmutable;
use PHPUnit\Framework\TestCase;
use PrestaShop\Cart\Model\Cart;
use PrestaShop\CartRule\Condition\CartRuleBasicsFieldsConditionValidator;
use PrestaShop\CartRule\Condition\ConditionInterface;
use PrestaShop\CartRule\Condition\Validation\CartRuleValidationContext;
use PrestaShop\CartRule\Model\CartRule;

class CartRuleBasicsFieldsConditionValidatorTest extends TestCase
{
    /**
     * @dataProvider cartRuleBasicsFieldsConditionValidatorDataProvider
     */
    public function testValidate(
        CartRuleBasicsFieldsConditionValidator $validator,
        ConditionInterface                     $condition,
        CartRuleValidationContext              $cartRuleContext,
        array                                  $expectedFailedConditions
    ): void {


        $validator->validate($condition, $cartRuleContext);
        $this->assertSame($expectedFailedConditions, $cartRuleContext->getErrors());
    }

    public function cartRuleBasicsFieldsConditionValidatorDataProvider(): array
    {
        $this->markTestSkipped('todo');

        $cartRule1 = new CartRule();
        $cartRule1->setQuantity(5);
        $cartRule1->setIdCustomer(1);
        $cartRule1->setDateFrom(new DateTimeImmutable('2022-12-10'));
        $cartRule1->setDateTo(new DateTimeImmutable('2023-12-11'));
        $cartRule1->setActive(true);

        $cartRule2 = new CartRule();
        $cartRule2->setQuantity(0);
        $cartRule2->setIdCustomer(1);
        $cartRule2->setDateFrom(new DateTimeImmutable('2022-12-10'));
        $cartRule2->setDateTo(new DateTimeImmutable('2023-12-11'));
        $cartRule2->setActive(true);

        $cartRule3 = new CartRule();
        $cartRule3->setQuantity(5);
        $cartRule3->setIdCustomer(2);
        $cartRule3->setDateFrom(new DateTimeImmutable('2022-12-10'));
        $cartRule3->setDateTo(new DateTimeImmutable('2023-12-11'));
        $cartRule3->setActive(true);

        $cartRule4 = new CartRule();
        $cartRule4->setQuantity(5);
        $cartRule4->setIdCustomer(1);
        $cartRule4->setDateFrom(null);
        $cartRule4->setActive(true);

        $cartRule5 = new CartRule();
        $cartRule5->setQuantity(5);
        $cartRule5->setIdCustomer(1);
        $cartRule5->setDateFrom(new DateTimeImmutable('2022-12-10'));
        $cartRule5->setDateTo(new DateTimeImmutable('2023-12-11'));
        $cartRule5->setActive(false);

        $cart1 = new Cart();
        $cart1->setCustomerId(1);

        return [
            [
                new CartRuleBasicsFieldsConditionValidator(),
                new \PrestaShop\CartRule\Condition\CartRuleBasicFields(),
                new CartRuleValidationContext($cartRule1, $cart1),
                [],
            ],
            [
                new CartRuleBasicsFieldsConditionValidator(),
                new \PrestaShop\CartRule\Condition\CartRuleBasicFields(),
                new CartRuleValidationContext($cartRule2, $cart1),
                ['This cart rule is no more available'],
            ],
            [
                new CartRuleBasicsFieldsConditionValidator(),
                new \PrestaShop\CartRule\Condition\CartRuleBasicFields(),
                new CartRuleValidationContext($cartRule3, $cart1),
                ['Invalid customer'],
            ],
            [
                new CartRuleBasicsFieldsConditionValidator(),
                new \PrestaShop\CartRule\Condition\CartRuleBasicFields(),
                new CartRuleValidationContext($cartRule4, $cart1),
                ['Invalid period'],
            ],
            [
                new CartRuleBasicsFieldsConditionValidator(),
                new \PrestaShop\CartRule\Condition\CartRuleBasicFields(),
                new CartRuleValidationContext($cartRule5, $cart1),
                ['Cart rule is inactive'],
            ],
        ];
    }
}

