<?php

namespace PrestaShop\Domain\Shop\Model;

interface ShopInterface
{
    public function getId(): int;
    public function getShopGroupId(): int;
    public function getName(): string;
    public function getColor(): string;
    public function getCategoryId(): int;
    public function getThemeName(): string;
    public function isActive(): bool;
    public function isDeleted(): bool;
}
