<?php

namespace PrestaShop\Currency\Model;

/**
 * Currency entities interface.
 *
 * Describes the behavior of currency classes
 */
interface CurrencyInterface
{
    public function getId(): int;

    /**
     * Check if this currency is active.
     *
     *              true if currency is active
     */
    public function isActive(): bool;

    /**
     * Get the conversion rate (exchange rate) of this currency against the shop's default currency.
     *
     * Price in currency A * currency A's conversion rate = price in default currency
     *
     * Example:
     * Given the Euro as default shop's currency,
     * If 1 dollar = 1.31 euros,
     * Then conversion rate for Dollar will be 1.31
     *
     *               The conversion rate of this currency
     */
    public function getConversionRate(): float;

    /**
     * Get the alphabetic ISO code of this currency.
     *
     * @see https://www.iso.org/iso-4217-currency-codes.html
     */
    public function getIsoCode(): string;

    /**
     * Get the numeric ISO code of this currency.
     *
     * @see https://www.iso.org/iso-4217-currency-codes.html
     */
    public function getNumericIsoCode(): ?int;

    /**
     * Get the currency symbol for a given locale code.
     *
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     * @see https://www.w3.org/International/articles/language-tags
     *
     *                The currency symbol for this locale
     */
    public function getSymbol(): string;

    /**
     * Get the number of decimal digits to use with this currency.
     *
     * Example: Euro's decimal precision is 2 (1 234,56 EUR)
     * Example: Colombian peso's decimal precision is 0 (1 235 COP)
     */
    public function getDecimalPrecision(): int;

    /**
     * Get the currency's name for a given locale code.
     *
     * @see https://en.wikipedia.org/wiki/IETF_language_tag
     * @see https://www.w3.org/International/articles/language-tags
     *
     *                The currency's name for this locale
     */
    public function getName(): string;
}
