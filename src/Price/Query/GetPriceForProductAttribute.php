<?php

namespace PrestaShop\Price\Query;

use PrestaShop\Currency\Model\CurrencyInterface;
use PrestaShop\Customer\Model\CustomerInterface;

class GetPriceForProductAttribute
{
    public function __construct(private readonly int $productAttribute, private readonly int $quantity = 1, private readonly ?int $customizationId = null, private readonly ?\PrestaShop\Currency\Model\CurrencyInterface $currency = null, private readonly ?\PrestaShop\Customer\Model\CustomerInterface $customer = null, private readonly bool $useSpecificPrices = true, private readonly bool $useTax = true, private readonly bool $useEcotax = true, private readonly bool $useGroupReduction = true, protected bool $allowNegativePrices = false)
    {
    }

    public function allowNegativePrices(): bool
    {
        return $this->allowNegativePrices;
    }

    public function getCurrency(): ?CurrencyInterface
    {
        return $this->currency;
    }

    public function getProductAttributeId(): int
    {
        return $this->productAttribute;
    }

    public function useEcotax(): bool
    {
        return $this->useEcotax;
    }

    public function isAllowNegativePrices(): bool
    {
        return $this->allowNegativePrices;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function isUseEcotax(): bool
    {
        return $this->useEcotax;
    }

    public function isUseSpecificPrices(): bool
    {
        return $this->useSpecificPrices;
    }

    public function isUseGroupReduction(): bool
    {
        return $this->useGroupReduction;
    }

    public function getCustomer(): ?CustomerInterface
    {
        return $this->customer;
    }

    public function getCustomizationId(): ?int
    {
        return $this->customizationId;
    }

    public function useTax(): bool
    {
        return $this->useTax;
    }
}


/**
$id_product,
$usetax = true,
$id_product_attribute = null,
$decimals = 6,
$divisor = null,
$only_reduc = false,
$usereduc = true,
$quantity = 1,
$force_associated_tax = false,
$id_customer = null,
$id_cart = null,
$id_address = null,
&$specific_price_output = null,
$with_ecotax = true,
$use_group_reduction = true,
Context $context = null,
$use_customer_price = true,
$id_customization = null
 */
