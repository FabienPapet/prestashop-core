<?php

namespace PrestaShop\Shop\Repository;

use PrestaShop\Shop\Model\ShopInterface;

interface ShopUrlRepositoryInterface
{
    public function getShopByHostName(string $url): ShopInterface;
}
