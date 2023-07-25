<?php

namespace App\Support;

class DefaultRoles
{
    public const SUPER_ADMINISTRATOR = 'super-administrator';
    public const ADMINISTRATOR = 'administrator';
    public const USER = 'user';
    public const SYSTEM = 'system';
    public const BOT = 'bot';

    protected static array $roles = [
        [
            'name' => self::SUPER_ADMINISTRATOR,
            'label' => 'Super Administrator',
            'description' => 'Super Administrator',
        ],
        [
            'name' => self::ADMINISTRATOR,
            'label' => 'Administrator',
            'description' => 'Administrator',
        ],
        [
            'name' => self::USER,
            'label' => 'User',
            'description' => 'User',
        ],
        [
            'name' => self::SYSTEM,
            'label' => 'System',
            'description' => 'This role is reserved for user accounts with automated system-related activities.',
        ],
        [
            'name' => self::BOT,
            'label' => 'Bot',
            'description' => 'This role is reserved for user accounts with automated activities.',
        ],
    ];

    public static function getRoles(): array
    {
        return self::$roles;
    }
}
