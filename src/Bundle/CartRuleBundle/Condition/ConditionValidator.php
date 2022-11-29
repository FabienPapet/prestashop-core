<?php

namespace PrestaShop\Bundle\CartRuleBundle\Condition;

use PrestaShop\Cart\Model\CartInterface;
use PrestaShop\CartRule\Condition\Factory\CartRuleConditionFactory;
use PrestaShop\CartRule\Condition\Validation\CartRuleValidationContext;
use PrestaShop\CartRule\Condition\Validation\ConditionValidatorInterface;
use PrestaShop\CartRule\Model\CartRuleInterface;
use Psr\Container\ContainerInterface;

class ConditionValidator
{
    public function __construct(private readonly ContainerInterface $validatorsContainer, private readonly CartRuleConditionFactory $conditionFactory)
    {
    }

    /**
     * @return string[]
     */
    public function validate(CartRuleInterface $cartRule, CartInterface $order): array
    {
        $context = new CartRuleValidationContext($cartRule, new \DateTimeImmutable());
        $cartRuleConditions = $this->conditionFactory->buildConditions($cartRule);

        foreach ($cartRuleConditions as $condition) {
            $validatorClass = $condition->isValidatedBy();

            if (!$this->validatorsContainer->has($validatorClass)) {
                throw new \RuntimeException(
                    sprintf('Validator %s is not found. Perhaps it is missing or missing service tag.', $validatorClass)
                );
            }

            /** @var ConditionValidatorInterface $validator */
            $validator = $this->validatorsContainer->get($condition->isValidatedBy());
            $validator->validate($condition, $context);
        }

        return $context->getErrors();
    }
}
