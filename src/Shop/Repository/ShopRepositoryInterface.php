<?php

namespace PrestaShop\Shop\Repository;

use PrestaShop\Shop\Model\ShopInterface;

interface ShopRepositoryInterface
{
    public function getShopById(int $shopId): ShopInterface;
}
