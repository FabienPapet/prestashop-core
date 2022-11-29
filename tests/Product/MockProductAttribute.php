<?php

namespace Tests\PrestaShop\Product;

use PrestaShop\Product\Model\ProductAttribute;

class MockProductAttribute
{
    public static function default(): ProductAttribute
    {
        return new ProductAttribute();
    }
}

