<?php

declare(strict_types=1);

namespace PrestaShop\CartRule\Model;

use DateTimeInterface;
use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Decimal\DecimalNumber;

class CartRule implements CartRuleInterface
{
    private int $id;
    private int $idCustomer;
    private ?DateTimeInterface $dateFrom = null;
    private ?DateTimeInterface $dateTo = null;
    private string $description = '';
    private int $quantity = 0;
    private int $quantityPerUser = 0;
    private int $priority = 0;
    private bool $partialUse;
    private string $code;
    private DecimalNumber $minimumAmount;
    private int $minimumAmountTax;
    private CurrencyInterface $minimumAmountCurrency;
    private bool $minimumAmountShipping = false;
    private int $countryRestriction;
    private int $carrierRestriction;
    private int $groupRestriction;
    private int $cartRuleRestriction;
    private int $productRestriction;
    private int $shopRestriction;
    private bool $freeShipping = false;
    private float $reductionPercent = 0;
    private float $reductionAmount = 0;
    private bool $reductionTax = false;
    private CurrencyInterface $reductionCurrency;
    private int $reductionProduct = 0;
    private bool $reductionExcludeSpecial = false;
    private bool $giftProduct = false;
    private int $giftProductAttribute = 0;
    private int $highlight = 0;
    private bool $active = false;
    private DateTimeInterface $dateAdd;
    private DateTimeInterface $dateUpd;

    public function __construct()
    {
        $this->minimumAmount = new DecimalNumber('0');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): CartRule
    {
        $this->id = $id;
        return $this;
    }

    public function getCustomerId(): int
    {
        return $this->idCustomer;
    }

    public function setIdCustomer(int $idCustomer): CartRule
    {
        $this->idCustomer = $idCustomer;
        return $this;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): CartRule
    {
        $this->description = $description;
        return $this;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): CartRule
    {
        $this->quantity = $quantity;
        return $this;
    }

    public function getQuantityPerUser(): int
    {
        return $this->quantityPerUser;
    }

    public function setQuantityPerUser(int $quantityPerUser): CartRule
    {
        $this->quantityPerUser = $quantityPerUser;
        return $this;
    }

    public function getPriority(): int
    {
        return $this->priority;
    }

    public function setPriority(int $priority): CartRule
    {
        $this->priority = $priority;
        return $this;
    }

    public function getPartialUse(): bool
    {
        return $this->partialUse;
    }

    public function setPartialUse(bool $partialUse): CartRule
    {
        $this->partialUse = $partialUse;
        return $this;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): CartRule
    {
        $this->code = $code;
        return $this;
    }

    public function getMinimumAmount(): DecimalNumber
    {
        return $this->minimumAmount;
    }

    public function setMinimumAmount(DecimalNumber $minimumAmount): CartRule
    {
        $this->minimumAmount = $minimumAmount;
        return $this;
    }

    public function getMinimumAmountTax(): int
    {
        return $this->minimumAmountTax;
    }

    public function setMinimumAmountTax(int $minimumAmountTax): CartRule
    {
        $this->minimumAmountTax = $minimumAmountTax;
        return $this;
    }

    public function getMinimumAmountCurrency(): CurrencyInterface
    {
        return $this->minimumAmountCurrency;
    }

    public function setMinimumAmountCurrency(CurrencyInterface $minimumAmountCurrency): CartRule
    {
        $this->minimumAmountCurrency = $minimumAmountCurrency;
        return $this;
    }

    public function getMinimumAmountShipping(): bool
    {
        return $this->minimumAmountShipping;
    }

    public function setMinimumAmountShipping(bool $minimumAmountShipping): CartRule
    {
        $this->minimumAmountShipping = $minimumAmountShipping;
        return $this;
    }

    public function getCountryRestriction(): int
    {
        return $this->countryRestriction;
    }

    public function setCountryRestriction(int $countryRestriction): CartRule
    {
        $this->countryRestriction = $countryRestriction;
        return $this;
    }

    public function getCarrierRestriction(): int
    {
        return $this->carrierRestriction;
    }

    public function setCarrierRestriction(int $carrierRestriction): CartRule
    {
        $this->carrierRestriction = $carrierRestriction;
        return $this;
    }

    public function getGroupRestriction(): int
    {
        return $this->groupRestriction;
    }

    public function setGroupRestriction(int $groupRestriction): CartRule
    {
        $this->groupRestriction = $groupRestriction;
        return $this;
    }

    public function getCartRuleRestriction(): int
    {
        return $this->cartRuleRestriction;
    }

    public function setCartRuleRestriction(int $cartRuleRestriction): CartRule
    {
        $this->cartRuleRestriction = $cartRuleRestriction;
        return $this;
    }

    public function getProductRestriction(): int
    {
        return $this->productRestriction;
    }

    public function setProductRestriction(int $productRestriction): CartRule
    {
        $this->productRestriction = $productRestriction;
        return $this;
    }

    public function getShopRestriction(): int
    {
        return $this->shopRestriction;
    }

    public function setShopRestriction(int $shopRestriction): CartRule
    {
        $this->shopRestriction = $shopRestriction;
        return $this;
    }

    public function enablesFreeShipping(): bool
    {
        return $this->freeShipping;
    }

    public function setFreeShipping(bool $freeShipping): CartRule
    {
        $this->freeShipping = $freeShipping;
        return $this;
    }

    public function getReductionPercent(): float
    {
        return $this->reductionPercent;
    }

    public function setReductionPercent(float $reductionPercent): CartRule
    {
        $this->reductionPercent = $reductionPercent;
        return $this;
    }

    public function getReductionAmount(): float
    {
        return $this->reductionAmount;
    }

    public function setReductionAmount(float $reductionAmount): CartRule
    {
        $this->reductionAmount = $reductionAmount;
        return $this;
    }

    public function getReductionTax(): bool
    {
        return $this->reductionTax;
    }

    public function setReductionTax(bool $reductionTax): CartRule
    {
        $this->reductionTax = $reductionTax;
        return $this;
    }

    public function getReductionCurrency(): CurrencyInterface
    {
        return $this->reductionCurrency;
    }

    public function setReductionCurrency(CurrencyInterface $reductionCurrency): CartRule
    {
        $this->reductionCurrency = $reductionCurrency;
        return $this;
    }

    public function getReductionProduct(): int
    {
        return $this->reductionProduct;
    }

    public function setReductionProduct(int $reductionProduct): CartRule
    {
        $this->reductionProduct = $reductionProduct;
        return $this;
    }

    public function getReductionExcludeSpecial(): bool
    {
        return $this->reductionExcludeSpecial;
    }

    public function setReductionExcludeSpecial(bool $reductionExcludeSpecial): CartRule
    {
        $this->reductionExcludeSpecial = $reductionExcludeSpecial;
        return $this;
    }

    public function isGiftProduct(): bool
    {
        return $this->giftProduct;
    }

    public function setGiftProduct(bool $giftProduct): CartRule
    {
        $this->giftProduct = $giftProduct;
        return $this;
    }

    public function getGiftProductAttribute(): int
    {
        return $this->giftProductAttribute;
    }

    public function setGiftProductAttribute(int $giftProductAttribute): CartRule
    {
        $this->giftProductAttribute = $giftProductAttribute;
        return $this;
    }

    public function getHighlight(): int
    {
        return $this->highlight;
    }

    public function setHighlight(int $highlight): CartRule
    {
        $this->highlight = $highlight;
        return $this;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): CartRule
    {
        $this->active = $active;
        return $this;
    }

    public function getDateFrom(): ?DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?DateTimeInterface $dateFrom): CartRule
    {
        $this->dateFrom = $dateFrom;
        return $this;
    }

    public function getDateTo(): ?DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(?DateTimeInterface $dateTo): CartRule
    {
        $this->dateTo = $dateTo;
        return $this;
    }

    public function getDateAdd(): DateTimeInterface
    {
        return $this->dateAdd;
    }

    public function setDateAdd(DateTimeInterface $dateAdd): CartRule
    {
        $this->dateAdd = $dateAdd;
        return $this;
    }

    public function getDateUpd(): DateTimeInterface
    {
        return $this->dateUpd;
    }

    public function setDateUpd(DateTimeInterface $dateUpd): CartRule
    {
        $this->dateUpd = $dateUpd;
        return $this;
    }
}
