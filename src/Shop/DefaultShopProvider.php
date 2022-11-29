<?php

namespace PrestaShop\Shop;

use PrestaShop\Shop\Configuration\ShopConfiguration;
use PrestaShop\Shop\Model\ShopInterface;
use PrestaShop\Shop\Repository\ShopRepositoryInterface;

class DefaultShopProvider implements DefaultShopProviderInterface
{
    public function __construct(
        private readonly ShopConfiguration $shopConfiguration,
        private readonly ShopRepositoryInterface $shopRepository
    ) {
    }

    public function getDefaultShop(): ShopInterface
    {
        return $this->shopRepository->getShopById($this->shopConfiguration->getDefaultShopId());
    }
}
