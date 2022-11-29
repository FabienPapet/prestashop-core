<?php

namespace PrestaShop\Currency\Model;

class Currency implements CurrencyInterface
{
    private bool $active = false;

    public function __construct(private readonly int $id, private readonly string $name, private readonly string $isoCode, private readonly float $conversionRate, private readonly string $symbol, private readonly int $decimalPrecision)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIsoCode(): string
    {
        return $this->isoCode;
    }

    public function getConversionRate(): float
    {
        return $this->conversionRate;
    }

    public function getDecimalPrecision(): int
    {
        return $this->decimalPrecision;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getNumericIsoCode(): int
    {
        return 10;
    }
}
