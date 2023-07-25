<?php

namespace App\Support\Facades;

use Illuminate\Support\Facades\Facade;
use App\Auth\AccessManager;

class Access extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return AccessManager::class;
    }
}
