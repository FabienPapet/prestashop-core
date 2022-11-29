<?php

use PrestaShop\Bundle\CartRuleBundle\Condition\ConditionValidator;
use PrestaShop\Cart\CartRule\Condition\CustomerIdConditionValidator;
use PrestaShop\CartRule\Condition\Validation\ConditionValidatorInterface;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

use function Symfony\Component\DependencyInjection\Loader\Configurator\tagged_locator;

return static function (ContainerConfigurator $configurator) {
    $services = $configurator->services()
        ->defaults()
        ->autowire()      // Automatically injects dependencies in your services.
        ->autoconfigure() // Automatically registers your services as commands, event subscribers, etc.
    ;

    $services->set(CustomerIdConditionValidator::class)
        ->tag('prestashop.cart_rules.condition_validator')
    ;
    $services
        ->set(ConditionValidator::class, ConditionValidator::class)
        ->args([tagged_locator('prestashop.cart_rules.condition_validator')])
        ->public()
    ;

    $services
        ->instanceof(ConditionValidatorInterface::class)
        ->tag('prestashop.cart_rules.condition_validator')
    ;
};
