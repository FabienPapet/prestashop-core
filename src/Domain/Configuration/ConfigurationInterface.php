<?php

namespace PrestaShop\Domain\Configuration;

use PrestaShop\Configuration\ShopConstraint;

interface ConfigurationInterface
{
    public function get(string $key, ShopConstraint $shopConstraint, $defaultValue = null);
}
