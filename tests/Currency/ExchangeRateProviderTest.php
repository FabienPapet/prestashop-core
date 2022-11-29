<?php

namespace Tests\PrestaShop\Currency;

use PHPUnit\Framework\TestCase;
use PrestaShop\Currency\ExchangeRateProvider;
use PrestaShop\Currency\Model\Currency;
use PrestaShop\Currency\Model\CurrencyInterface;
use Tests\PrestaShop\Currency\Mock\MockCurrency;
use Tests\PrestaShop\Currency\Mock\MockDefaultCurrencyProvider;

class ExchangeRateProviderTest extends TestCase
{
    private ExchangeRateProvider $exchangeRate;

    public function setUp(): void
    {
        $this->exchangeRate = new ExchangeRateProvider(
            new MockDefaultCurrencyProvider(MockCurrency::eur())
        );
    }

    /**
     * @dataProvider getExchangeRates
     */
    public function testExchangeRate(CurrencyInterface $from, CurrencyInterface $to, string $expected, int $precision = 2): void
    {
        self::assertSame(
            $expected,
            $this->exchangeRate->getExchangeRate($from, $to)->toPrecision($precision)
        );
    }

    public function getExchangeRates(): iterable
    {
        $eur = MockCurrency::eur();
        $usd = MockCurrency::usd();
        $testCurrency = new Currency(4, 'Test', 'aaa', 8, '$$', 2, true);
        $birCurrency = new Currency(5, 'BYR', 'BYR', 20845.295282, 'BYR', 2, true);

        $fakeCurrencyWithRate0dot5 = new Currency(7, 'Fake 1', 'Fak', 0.5, 'FAK1', 2, true);
        $fakeCurrencyWithRate2 = new Currency(8, 'Fake 2', 'Fak2', 2, 'FAK2', 2, true);

        yield 'default to default (eur)' => [$eur, $eur, '1.00'];
        yield 'same iso to same iso' => [$usd, $usd, '1.00'];
        yield 'usd to default (keep exchange ratio)' => [$usd, $eur, '0.75'];
        yield 'default to usd (1/exchange ratio)' => [$eur, $testCurrency, '0.125', 3];
        yield 'default to usd (1/exchange ratio) unfinite number' => [$eur, $usd, '1.333333', 6];
        yield 'using big numbers' => [$birCurrency, $eur, '20845.295282', 6];
        yield 'using big numbers (1/ER)' => [$eur, $birCurrency, '0.000047', 6];

        // Use intermediate default currency
        yield 'fake1 to fake2' => [$fakeCurrencyWithRate0dot5, $fakeCurrencyWithRate2, '0.25'];
        yield 'fake2 to fake1' => [$fakeCurrencyWithRate2, $fakeCurrencyWithRate0dot5, '4.00'];
    }
}
