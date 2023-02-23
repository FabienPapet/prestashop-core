<?php

namespace PrestaShop\Domain\Shop\Repository;

use PrestaShop\Domain\Shop\Model\ShopInterface;

interface ShopUrlRepositoryInterface
{
    public function getShopByHostName(string $url): ShopInterface;
}
