<?php

namespace PrestaShop\Product\Repository;

use PrestaShop\Product\Model\Product;

interface ProductRepositoryInterface
{
    public function findById(int $productId): Product;
}
