<?php

namespace PrestaShop\CartRule\Action;

class AddProductAsGift implements ActionInterface
{
    public function __construct(private readonly int $productId)
    {
    }

    public function getProductId(): int
    {
        return $this->productId;
    }
}
