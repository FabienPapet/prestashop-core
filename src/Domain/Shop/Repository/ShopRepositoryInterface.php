<?php

namespace PrestaShop\Domain\Shop\Repository;

use PrestaShop\Domain\Shop\Model\ShopInterface;

interface ShopRepositoryInterface
{
    public function getShopById(int $shopId): ShopInterface;
}
