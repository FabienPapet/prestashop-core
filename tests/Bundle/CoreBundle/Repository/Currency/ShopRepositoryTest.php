<?php

namespace Tests\PrestaShop\Bundle\CoreBundle\Repository\Currency;

use PrestaShop\Shop\Repository\ShopRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ShopRepositoryTest extends KernelTestCase
{
    public function testGetShop(): void
    {
        self::bootKernel();
        $repository = static::getContainer()->get(ShopRepositoryInterface::class);

        $shop = $repository->getShopById(1);

        self::assertSame('Fabien Papet', $shop->getName());
    }
}
