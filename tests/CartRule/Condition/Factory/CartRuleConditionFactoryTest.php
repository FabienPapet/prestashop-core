<?php

namespace Tests\PrestaShop\CartRule\Condition\Factory;

use Generator;
use PHPUnit\Framework\TestCase;
use PrestaShop\CartRule\Action\AddProductAsGift;
use PrestaShop\CartRule\Action\ApplyOrderReductionAmount;
use PrestaShop\CartRule\Action\ApplyOrderReductionPercent;
use PrestaShop\CartRule\Action\EnableFreeShipping;
use PrestaShop\CartRule\Condition\CartMinimalAmount;
use PrestaShop\CartRule\Condition\CartRuleBasicFields;
use PrestaShop\CartRule\Condition\Factory\CartRuleConditionFactory;
use PrestaShop\CartRule\Model\CartRule;
use PrestaShop\CartRule\Model\CartRuleInterface;
use PrestaShop\Decimal\DecimalNumber;
use Tests\PrestaShop\Currency\Mock\MockCurrency;

class CartRuleConditionFactoryTest extends TestCase
{
    /**
     * @dataProvider cartRulesProvider
     */
    public function testBuildConditions(CartRuleInterface $cartRule, array $expectedConditions, array $expectedActions): void
    {
        $factory = new CartRuleConditionFactory();
        $this->assertEquals($expectedConditions, $factory->buildConditions($cartRule));
        $this->assertEquals($expectedActions, $factory->buildActions($cartRule));
    }

    public function cartRulesProvider(): Generator
    {
        $eur = MockCurrency::eur();
        $usd = MockCurrency::usd();

        $cartRule1 = new CartRule();
        $cartRule1
            // conditions
            ->setMinimumAmount(new DecimalNumber('10.5'))
            ->setMinimumAmountCurrency($eur)
            ->setMinimumAmountShipping(true)
            ->setMinimumAmountTax(true)
            // actions
            ->setFreeShipping(true)
        ;

        $cartRule2 = new CartRule();
        $cartRule2
            // conditions
            ->setMinimumAmount(new DecimalNumber('10.5'))
            ->setMinimumAmountCurrency($eur)
            ->setMinimumAmountShipping(false)
            ->setMinimumAmountTax(false)
            // actions
            ->setFreeShipping(true)
        ;

        $cartRule3 = new CartRule();
        $cartRule3
            // conditions
            ->setIdCustomer(42)
            // actions
            ->setReductionExcludeSpecial(false)
            ->setReductionPercent(10.12)
        ;

        $cartRule4 = new CartRule();
        $cartRule4
            // conditions
            ->setMinimumAmount(new DecimalNumber('100'))
            ->setMinimumAmountCurrency($eur)
            ->setMinimumAmountShipping(false)
            ->setMinimumAmountTax(false)
            // actions
            ->setReductionAmount(10)
            ->setReductionCurrency($usd)
            ->setReductionTax(false)
            ->setGiftProduct(true)
            ->setGiftProductAttribute(42)
        ;

        yield 'Min 10€HT w/o shipping => enable free shipping' => [
            $cartRule1,[
                new CartRuleBasicFields(),
                new CartMinimalAmount(new DecimalNumber('10.5'), true, true, $eur),
            ], [
                new EnableFreeShipping()
            ],
        ];

        yield 'Min 10€TTC w/o shipping => enable free shipping' => [
            $cartRule2,[
                new CartRuleBasicFields(),
                new CartMinimalAmount(new DecimalNumber('10.5'), false, false, $eur),
            ], [
                new EnableFreeShipping()
            ],
        ];

        yield 'Customer 42 => 10.12% of reduction on the command and free shipping' => [
            $cartRule3,[
                new CartRuleBasicFields(),
            ], [
                new ApplyOrderReductionPercent(10.12, false),
            ],
        ];

        yield '10$ reduction + free shipping starting at 100€ HT w/o transport' => [
            $cartRule4,[
                new CartRuleBasicFields(),
                new CartMinimalAmount(new DecimalNumber('100'), false, false, $eur),
            ], [
                new ApplyOrderReductionAmount(10, $usd, false),
                new AddProductAsGift(42)
            ]
        ];
    }
}
