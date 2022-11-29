<?php

namespace Tests\PrestaShop\Bundle\CoreBundle\Repository\Currency;

use PrestaShop\Bundle\CoreBundle\Repository\Currency\CurrencyRepository;
use PrestaShop\Currency\Repository\CurrencyRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class CurrencyRepositoryTest extends KernelTestCase
{
    public function testGetCurrency(): void
    {
        /** @var CurrencyRepository $repository */
        $repository = static::getContainer()->get(CurrencyRepositoryInterface::class);

        $currency = $repository->getCurrencyById(1, 1);
        self::assertTrue($currency->isActive());
        self::assertSame('EUR', $currency->getIsoCode());
    }
}
