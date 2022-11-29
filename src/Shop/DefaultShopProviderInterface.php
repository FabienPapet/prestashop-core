<?php

namespace PrestaShop\Shop;

use PrestaShop\Shop\Model\ShopInterface;

interface DefaultShopProviderInterface
{
    public function getDefaultShop(): ShopInterface;
}
