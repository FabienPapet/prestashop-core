<?php

declare(strict_types=1);

namespace PrestaShop\Currency;

use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Decimal\DecimalNumber;

class ExchangeRateProvider implements ExchangeRateProviderInterface
{
    public function __construct(
        private readonly DefaultCurrencyProviderInterface $currencyProvider,
    ) {
    }

    public function getExchangeRate(CurrencyInterface $from, CurrencyInterface $to): DecimalNumber
    {
        $defaultCurrencyId = $this->currencyProvider->getDefaultCurrencyId();

        if ($from->getIsoCode() === $to->getIsoCode()) {
            return new DecimalNumber('1.0');
        }

        if ($to->getId() === $defaultCurrencyId) {
            return new DecimalNumber((string) $from->getConversionRate());
        }

        if ($from->getId() === $defaultCurrencyId) {
            return (new DecimalNumber('1.0'))->dividedBy(
                new DecimalNumber((string) $to->getConversionRate())
            );
        }

        return (new DecimalNumber((string) $from->getConversionRate()))->dividedBy(
            new DecimalNumber((string) $to->getConversionRate())
        );
    }
}
