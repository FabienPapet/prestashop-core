<?php

namespace PrestaShop\Domain\Shop\Model;

class ShopUrl implements ShopUrlInterface
{
    public function __construct(private readonly int $id, private readonly int $shopId, private readonly string $domain, private readonly string $domain_ssl, private readonly string $physical_uri, private readonly string $virtual_uri, private readonly bool $main, private readonly bool $active)
    {
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getShopId(): int
    {
        return $this->shopId;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function getDomainSsl(): string
    {
        return $this->domain_ssl;
    }

    public function getPhysicalUri(): string
    {
        return $this->physical_uri;
    }

    public function getVirtualUri(): string
    {
        return $this->virtual_uri;
    }

    public function isMain(): bool
    {
        return $this->main;
    }

    public function isActive(): bool
    {
        return $this->active;
    }
}
