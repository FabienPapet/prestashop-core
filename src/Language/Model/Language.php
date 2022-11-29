<?php

namespace PrestaShop\Language\Model;

class Language implements LanguageInterface
{
    public function __construct(
        private readonly int $id,
        private readonly string $name,
        private readonly bool $active,
        private readonly string $iso_code,
        private readonly string $language_code,
        private readonly string $locale,
        private readonly string $date_format_lite,
        private readonly string $date_format_full,
        private readonly bool $is_rtl
    ) {
    }


    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function getIsoCode(): string
    {
        return $this->iso_code;
    }

    public function getLanguageCode(): string
    {
        return $this->language_code;
    }

    public function getLocale(): string
    {
        return $this->locale;
    }

    public function getDateFormatLite(): string
    {
        return $this->date_format_lite;
    }

    public function getDateFormatFull(): string
    {
        return $this->date_format_full;
    }

    public function isRtl(): bool
    {
        return $this->is_rtl;
    }
}
