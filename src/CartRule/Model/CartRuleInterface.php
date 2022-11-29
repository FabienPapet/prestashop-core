<?php

namespace PrestaShop\CartRule\Model;

use DateTimeInterface;
use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Decimal\DecimalNumber;

interface CartRuleInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getCustomerId(): int;

    /**
     * @return ?DateTimeInterface
     */
    public function getDateFrom(): ?DateTimeInterface;

    /**
     * @return ?DateTimeInterface
     */
    public function getDateTo(): ?DateTimeInterface;

    /**
     * @return string
     */
    public function getDescription(): string;

    /**
     * @return int
     */
    public function getQuantity(): int;

    /**
     * @return int
     */
    public function getQuantityPerUser(): int;

    /**
     * @param int $quantityPerUser
     * @return CartRule
     */
    public function setQuantityPerUser(int $quantityPerUser): CartRule;

    /**
     * @return int
     */
    public function getPriority(): int;

    /**
     * @return bool
     */
    public function getPartialUse(): bool;

    /**
     * @return string
     */
    public function getCode(): string;

    /**
     * @return DecimalNumber
     */
    public function getMinimumAmount(): DecimalNumber;

    /**
     * @return int
     */
    public function getMinimumAmountTax(): int;

    /**
     * @return CurrencyInterface
     */
    public function getMinimumAmountCurrency(): CurrencyInterface;

    /**
     * @return bool
     */
    public function getMinimumAmountShipping(): bool;

    /**
     * @param bool $minimumAmountShipping
     * @return CartRule
     */
    public function setMinimumAmountShipping(bool $minimumAmountShipping): CartRule;

    /**
     * @return int
     */
    public function getCountryRestriction(): int;

    /**
     * @return int
     */
    public function getCarrierRestriction(): int;

    /**
     * @return int
     */
    public function getGroupRestriction(): int;

    /**
     * @return int
     */
    public function getCartRuleRestriction(): int;

    /**
     * @return int
     */
    public function getProductRestriction(): int;

    /**
     * @return int
     */
    public function getShopRestriction(): int;

    public function enablesFreeShipping(): bool;

    /**
     * @return float
     */
    public function getReductionPercent(): float;

    /**
     * @return float
     */
    public function getReductionAmount(): float;

    /**
     * @return bool
     */
    public function getReductionTax(): bool;

    /**
     * @param bool $reductionTax
     * @return CartRule
     */
    public function setReductionTax(bool $reductionTax): CartRule;

    /**
     * @return CurrencyInterface
     */
    public function getReductionCurrency(): CurrencyInterface;

    /**
     * @return int
     */
    public function getReductionProduct(): int;

    /**
     * @return bool
     */
    public function getReductionExcludeSpecial(): bool;

    /**
     * @param bool $reductionExcludeSpecial
     * @return CartRule
     */
    public function setReductionExcludeSpecial(bool $reductionExcludeSpecial): CartRule;

    /**
     * @return bool
     */
    public function isGiftProduct(): bool;

    /**
     * @return int
     */
    public function getGiftProductAttribute(): int;

    /**
     * @return int
     */
    public function getHighlight(): int;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @return ?DateTimeInterface
     */
    public function getDateAdd(): ?DateTimeInterface;

    /**
     * @return ?DateTimeInterface
     */
    public function getDateUpd(): ?DateTimeInterface;
}
