<?php

namespace PrestaShop\CartRule\Repository;

use PrestaShop\CartRule\Model\CartRuleInterface;

interface CartRuleRepositoryInterface
{
    /**
     * @throws \RuntimeException
     */
    public function findByCode(string $code, int $langId): CartRuleInterface;

    /**
     * @throws \RuntimeException
     */
    public function findById(int $id, int $langId): CartRuleInterface;

    /**
     * @return CartRuleInterface[]
     */
    public function getCartRules(CartRuleQuery $queryBuilder): array;
    public function exists(int $id): bool;
    public function delete(int $id): bool;
    public function deleteForCustomer(int $customerId): bool;
    public function save(CartRuleInterface $cartRule): static;
}
