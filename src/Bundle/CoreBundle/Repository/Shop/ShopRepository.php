<?php

namespace PrestaShop\Bundle\CoreBundle\Repository\Shop;

use PrestaShop\Bundle\CoreBundle\Repository\AbstractRepository;
use PrestaShop\Shop\Model\Shop;
use PrestaShop\Shop\Model\ShopInterface;
use PrestaShop\Shop\Repository\ShopRepositoryInterface;

class ShopRepository extends AbstractRepository implements ShopRepositoryInterface
{
    public function getShopById(int $shopId): ShopInterface
    {
        $qb = $this->createQueryBuilder()
            ->from($this->table('shop'), 's')
            ->andWhere('s.id_shop = :id')
            ->setParameter('id', $shopId)
        ;

        return $this->buildModel($qb->executeQuery()->fetchAssociative());
    }

    protected function buildModel(array $result): Shop
    {
        return new Shop(
            $result['id_shop'],
            $result['id_shop_group'],
            $result['name'],
            $result['color'],
            (int) $result['id_category'],
            $result['theme_name'],
            (bool) $result['active'],
            (bool) $result['deleted'],
        );
    }
}
