<?php

namespace PrestaShop\Product\Repository;

use PrestaShop\Product\Model\ProductAttribute;

interface ProductAttributeRepositoryInterface
{
    public function getProductAttribute(int $productAttribute): ProductAttribute;
}
