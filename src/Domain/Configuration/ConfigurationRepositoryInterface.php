<?php

namespace PrestaShop\Domain\Configuration;

interface ConfigurationRepositoryInterface
{
    public function loadConfiguration(): array;
}
