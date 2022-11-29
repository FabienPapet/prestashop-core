<?php

namespace Tests\PrestaShop\Price;

use PHPUnit\Framework\TestCase;
use PrestaShop\Customization\CustomizationPriceProviderInterface;
use PrestaShop\Decimal\DecimalNumber;
use PrestaShop\Price\PriceProvider;
use PrestaShop\Price\Query\GetPriceForProductAttribute;
use PrestaShop\Product\Model\ProductAttribute;
use PrestaShop\Product\Repository\ProductAttributeRepositoryInterface;
use Tests\PrestaShop\Product\MockProductAttribute;

class PriceProviderTest extends TestCase
{

    /**
     * @dataProvider getPriceCalculationValues
     */
    public function testPriceProvider(ProductAttribute $productAttribute, int $quantity, float $customizationPrice, float $expected): void
    {
        $priceProvider = new PriceProvider(
            $attributeMock = $this->createMock(ProductAttributeRepositoryInterface::class),
            $customizationProvider = $this->createMock(CustomizationPriceProviderInterface::class),
        );

        $attributeMock->expects($this->once())
            ->method('getProductAttribute')
            ->willReturn($productAttribute);

        $customizationProvider
            ->method('getCustomizationPrice')
            ->willReturn(new DecimalNumber((string) $customizationPrice))
        ;

        $query = new GetPriceForProductAttribute(
            productAttribute: $productAttribute->getId(),
            quantity: $quantity,
            customizationId: 42,
            useTax: false,
            useEcotax: false
        );

        self::assertSame($expected,
            $priceProvider->getPriceForProductAttribute($query)
        );
    }

    public function getPriceCalculationValues(): iterable
    {
        // base price,
        yield [MockProductAttribute::default(), 1, 0, 12.15];
        yield [MockProductAttribute::default(), 2, 0, 24.30];
        yield [MockProductAttribute::default(), 1, 20.0, 32.15];
        yield [MockProductAttribute::default(), 2, 40.0, 64.3];
    }
}
