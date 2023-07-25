<?php

namespace App\Providers;

use App\Support\DefaultAccess;
use App\Support\DefaultPermissions;
use App\Support\DefaultRoles;
use App\Support\Facades\Access;
use Illuminate\Support\ServiceProvider;

class AccessServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Access::registerRoles(DefaultRoles::getRoles());
        Access::registerPermissions(DefaultPermissions::getPermissions());
        Access::registerAccess(DefaultAccess::getAccess());
    }
}
