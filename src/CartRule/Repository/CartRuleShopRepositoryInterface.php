<?php

namespace PrestaShop\CartRule\Repository;

use PrestaShop\CartRule\Model\CartRuleInterface;

interface CartRuleShopRepositoryInterface extends CartRuleRepositoryInterface
{
    /**
     * @throws \RuntimeException
     */
    public function findByCode(string $code, int $langId, int $idShop = null): CartRuleInterface;

    /**
     * @throws \RuntimeException
     */
    public function findById(int $id, int $langId, int $idShop = null): CartRuleInterface;
}
