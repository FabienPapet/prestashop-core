<?php

namespace PrestaShop\Domain\Shop\Model;

class Shop implements ShopInterface
{
    public function __construct(private readonly int $id, private readonly int $shopGroupId, private readonly string $name, private readonly string $color, private readonly int $categoryId, private readonly string $themeName, private readonly bool $active = true, private readonly bool $deleted = false)
    {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getShopGroupId(): int
    {
        return $this->shopGroupId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function getThemeName(): string
    {
        return $this->themeName;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isDeleted(): bool
    {
        return $this->deleted;
    }
}
