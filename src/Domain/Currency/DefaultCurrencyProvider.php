<?php

namespace PrestaShop\Domain\Currency;

use PrestaShop\Domain\Currency\Configuration\CurrencyConfigurationInterface;
use PrestaShop\Domain\Currency\Model\CurrencyInterface;
use PrestaShop\Domain\Currency\Repository\CurrencyRepositoryInterface;

class DefaultCurrencyProvider implements DefaultCurrencyProviderInterface
{
    public function __construct(
        private readonly CurrencyConfigurationInterface $currencyConfiguration,
        private readonly CurrencyRepositoryInterface $currencyRepository,
    ) {
    }

    public function getDefaultCurrency(): CurrencyInterface
    {
        return $this->currencyRepository->getCurrencyById(
            $this->currencyConfiguration->getDefaultCurrencyId(),
            $this->currencyConfiguration->getDefaultCurrencyLangId()
        );
    }

    public function getDefaultCurrencyId(): int
    {
        return $this->currencyConfiguration->getDefaultCurrencyId();
    }

    public function getDefaultCurrencyIsoCode(): string
    {
        return $this->getDefaultCurrency()->getIsoCode();
    }
}
