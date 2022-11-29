<?php

namespace PrestaShop\Bundle\CoreBundle\Context;

use PrestaShop\Language\Model\LanguageInterface;
use PrestaShop\Shop\Model\ShopInterface;

final class Context
{
    public function __construct(
        private readonly ShopInterface     $shop,
        private readonly LanguageInterface $lang,
    ) {
    }

    public function getShop(): ShopInterface
    {
        return $this->shop;
    }

    public function getLang(): LanguageInterface
    {
        return $this->lang;
    }
}
