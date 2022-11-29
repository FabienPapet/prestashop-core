<?php

namespace PrestaShop\Bundle\CoreBundle\Context;

use PrestaShop\Language\Model\Language;
use PrestaShop\Shop\DefaultShopProviderInterface;
use PrestaShop\Shop\Model\ShopInterface;
use PrestaShop\Shop\Model\ShopUrl;
use PrestaShop\Shop\Repository\ShopRepositoryInterface;
use Symfony\Component\HttpFoundation\Request;

class ContextBuilder
{
    public function __construct(
        private readonly ShopRepositoryInterface $repository,
        private readonly DefaultShopProviderInterface $shopProvider,
    ) {
    }

    public function build(Request $request): Context
    {
        $shop = $this->getShop($request);

        $request->attributes->set('shop', $shop);

        $language = new Language();

        return new Context($shop, $language);
    }

    private function getShop(Request $request): ShopInterface
    {
        $shopUrl = $this->getShopUrl($request);
        $shop = $this->repository->getShopById($shopUrl->getShopId());

        if ($shop->isActive()) {
            return $shop;
        }

        return $this->shopProvider->getDefaultShop();
    }

    private function getShopUrl(Request $request): ShopUrl
    {
        $shopUrl = new ShopUrl();

        return $shopUrl;
    }
}
