<?php

namespace PrestaShop\Domain\Shop\Model;

interface ShopUrlInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return int
     */
    public function getShopId(): int;

    /**
     * @return string
     */
    public function getDomain(): string;

    /**
     * @return string
     */
    public function getDomainSsl(): string;

    /**
     * @return string
     */
    public function getPhysicalUri(): string;

    /**
     * @return string
     */
    public function getVirtualUri(): string;

    /**
     * @return bool
     */
    public function isMain(): bool;

    /**
     * @return bool
     */
    public function isActive(): bool;
}
