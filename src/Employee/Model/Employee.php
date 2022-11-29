<?php

namespace PrestaShop\Employee\Model;

use DateTimeImmutable;

class Employee implements EmployeeInterface
{
    public function __construct(
        private readonly int $id_employee,
        private readonly int $id_profile,
        private readonly int $id_lang,
        private readonly string $lastname,
        private readonly string $firstname,
        private readonly string $email,
        private readonly string $passwd,
        private readonly DateTimeImmutable $last_passwd_gen,
        private readonly DateTimeImmutable $stats_date_from,
        private readonly DateTimeImmutable $stats_date_to,
        private readonly DateTimeImmutable $stats_compare_from,
        private readonly DateTimeImmutable $stats_compare_to,
        private readonly bool $stats_compare_option,
        private $preselect_date_range,
        private readonly ?string $bo_color,
        private readonly ?string $bo_theme,
        private readonly ?string $bo_css,
        private readonly bool $default_tab,
        private readonly int $bo_width,
        private readonly int $bo_menu,
        private readonly bool $active,
        private readonly bool $optin,
        private readonly int $id_last_order,
        private readonly int $id_last_customer_message,
        private readonly int $id_last_customer,
        private readonly DateTimeImmutable $last_connection_date,
        private readonly ?string $reset_password_token,
        private readonly ?\DateTimeImmutable $reset_password_validity,
        private readonly bool $has_enabled_gravatar)
    {
    }

    public function getIdEmployee(): int
    {
        return $this->id_employee;
    }

    public function getIdProfile(): int
    {
        return $this->id_profile;
    }

    public function getIdLang(): int
    {
        return $this->id_lang;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPasswd(): string
    {
        return $this->passwd;
    }

    public function getLastPasswdGen(): DateTimeImmutable
    {
        return $this->last_passwd_gen;
    }

    public function getStatsDateFrom(): DateTimeImmutable
    {
        return $this->stats_date_from;
    }

    public function getStatsDateTo(): DateTimeImmutable
    {
        return $this->stats_date_to;
    }

    public function getStatsCompareFrom(): DateTimeImmutable
    {
        return $this->stats_compare_from;
    }

    public function getStatsCompareTo(): DateTimeImmutable
    {
        return $this->stats_compare_to;
    }

    public function isStatsCompareOption(): bool
    {
        return $this->stats_compare_option;
    }

    /**
     * @return mixed
     */
    public function getPreselectDateRange()
    {
        return $this->preselect_date_range;
    }

    public function getBoColor(): ?string
    {
        return $this->bo_color;
    }

    public function getBoTheme(): ?string
    {
        return $this->bo_theme;
    }

    public function getBoCss(): ?string
    {
        return $this->bo_css;
    }

    public function isDefaultTab(): bool
    {
        return $this->default_tab;
    }

    public function getBoWidth(): int
    {
        return $this->bo_width;
    }

    public function getBoMenu(): int
    {
        return $this->bo_menu;
    }

    public function isActive(): bool
    {
        return $this->active;
    }

    public function isOptin(): bool
    {
        return $this->optin;
    }

    public function getIdLastOrder(): int
    {
        return $this->id_last_order;
    }

    public function getIdLastCustomerMessage(): int
    {
        return $this->id_last_customer_message;
    }

    public function getIdLastCustomer(): int
    {
        return $this->id_last_customer;
    }

    public function getLastConnectionDate(): DateTimeImmutable
    {
        return $this->last_connection_date;
    }

    public function getResetPasswordToken(): ?string
    {
        return $this->reset_password_token;
    }

    public function getResetPasswordValidity(): ?DateTimeImmutable
    {
        return $this->reset_password_validity;
    }

    public function isHasEnabledGravatar(): bool
    {
        return $this->has_enabled_gravatar;
    }
}
