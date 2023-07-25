<?php

namespace App\Models;

use Database\Factories\RoleFactory;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Permission\Models\Role as BaseRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Support\DefaultRoles;

class Role extends BaseRole
{
    use HasFactory;

    public function scopeWithoutSensitive(Builder $builder): Builder
    {
        return $builder->whereNotIn('name', [
            DefaultRoles::SUPER_ADMINISTRATOR,
            DefaultRoles::SYSTEM,
            DefaultRoles::BOT,
        ]);
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory<static>
     */
    protected static function newFactory()
    {
        return RoleFactory::new();
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(function (Builder $builder) {
            $builder->withoutSensitive();
        });
    }
}
