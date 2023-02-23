<?php

namespace PrestaShop\Domain\Shop;

use PrestaShop\Domain\Shop\Model\ShopInterface;

interface DefaultShopProviderInterface
{
    public function getDefaultShop(): ShopInterface;
}
