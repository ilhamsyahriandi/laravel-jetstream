<?php

namespace App\Support;

class DefaultAccess
{
    protected static array $access = [
        DefaultRoles::SUPER_ADMINISTRATOR => [
            DefaultPermissions::VIEW_ANY_ROLES,
            DefaultPermissions::DELETE_ANY_ROLES,
            DefaultPermissions::CREATE_ROLE,
            DefaultPermissions::VIEW_ROLE,
            DefaultPermissions::UPDATE_ROLE,
            DefaultPermissions::DELETE_ROLE,

            DefaultPermissions::VIEW_ANY_USERS,
            DefaultPermissions::DELETE_ANY_USERS,
            DefaultPermissions::CREATE_USER,
            DefaultPermissions::VIEW_USER,
            DefaultPermissions::UPDATE_USER,
            DefaultPermissions::DELETE_USER,

            DefaultPermissions::VIEW_ANY_POSTS,
            DefaultPermissions::DELETE_ANY_POSTS,
            DefaultPermissions::CREATE_POST,
            DefaultPermissions::VIEW_POST,
            DefaultPermissions::UPDATE_POST,
            DefaultPermissions::DELETE_POST,

        ],

        DefaultRoles::ADMINISTRATOR => [
            DefaultPermissions::VIEW_ANY_ROLES,
            DefaultPermissions::DELETE_ANY_ROLES,
            DefaultPermissions::CREATE_ROLE,
            DefaultPermissions::VIEW_ROLE,
            // DefaultPermissions::UPDATE_ROLE,
            // DefaultPermissions::DELETE_ROLE,

            DefaultPermissions::VIEW_ANY_USERS,
            // DefaultPermissions::DELETE_ANY_USERS,
            DefaultPermissions::CREATE_USER,
            DefaultPermissions::VIEW_USER,
            // DefaultPermissions::UPDATE_USER,
            // DefaultPermissions::DELETE_USER,

            DefaultPermissions::VIEW_ANY_POSTS,
            // DefaultPermissions::DELETE_ANY_POSTS,
            DefaultPermissions::CREATE_POST,
            DefaultPermissions::VIEW_POST,
            DefaultPermissions::UPDATE_POST,
            // DefaultPermissions::DELETE_POST,

        ],


        DefaultRoles::USER => [
            // DefaultPermissions::VIEW_ANY_POSTS,
            // DefaultPermissions::DELETE_ANY_POSTS,
            DefaultPermissions::CREATE_POST,
            DefaultPermissions::VIEW_POST,
            // DefaultPermissions::UPDATE_POST,
            // DefaultPermissions::DELETE_POST,

        ],
    ];

    public static function getAccess(): array
    {
        return self::$access;
    }
}
