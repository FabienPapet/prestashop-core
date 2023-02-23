<?php

namespace PrestaShop\Domain\Language\Model;

interface LanguageInterface
{
    /**
     * @return int
     */
    public function getId(): int;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function isActive(): bool;

    /**
     * @return string
     */
    public function getIsoCode(): string;

    /**
     * @return string
     */
    public function getLanguageCode(): string;

    /**
     * @return string
     */
    public function getLocale(): string;

    /**
     * @return string
     */
    public function getDateFormatLite(): string;

    /**
     * @return string
     */
    public function getDateFormatFull(): string;

    /**
     * @return bool
     */
    public function isRtl(): bool;
}
