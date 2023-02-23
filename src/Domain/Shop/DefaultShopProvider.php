<?php

namespace PrestaShop\Domain\Shop;

use PrestaShop\Domain\Shop\Configuration\ShopConfiguration;
use PrestaShop\Domain\Shop\Model\ShopInterface;
use PrestaShop\Domain\Shop\Repository\ShopRepositoryInterface;

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
