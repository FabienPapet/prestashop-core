<?php

namespace PrestaShop\CartRule\Exception;

use RuntimeException;

class ValidationException extends RuntimeException
{
    /**
     * @param array<int, string> $errors
     */
    public function __construct(private readonly array $errors)
    {
        parent::__construct('Errors');
    }

    /**
     * @return array<int, string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
