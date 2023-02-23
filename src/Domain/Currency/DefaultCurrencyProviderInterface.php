<?php

namespace PrestaShop\Domain\Currency;

use PrestaShop\Domain\Currency\Exception\CurrencyNotFoundException;
use PrestaShop\Domain\Currency\Model\CurrencyInterface;

interface DefaultCurrencyProviderInterface
{
    /**
     * Get default currency object
     *
     * @return CurrencyInterface
     * @throws CurrencyNotFoundException
     */
    public function getDefaultCurrency(): CurrencyInterface;

    /**
     * Get default currency id
     *
     * @return int
     * @throws CurrencyNotFoundException
     */
    public function getDefaultCurrencyId(): int;

    /**
     * Get default currency iso code
     *
     * @return string
     * @throws CurrencyNotFoundException
     */
    public function getDefaultCurrencyIsoCode(): string;
}
