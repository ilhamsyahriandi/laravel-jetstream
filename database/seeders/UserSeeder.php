<?php

namespace Database\Seeders;

use App\Models\User;
use App\Support\DefaultRoles;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $zupazup = User::factory()->create([
            'name' => 'zupazup',
            'email' => 'zupazup@example.com',
        ]);

        $zupazup->assignRole(DefaultRoles::SUPER_ADMINISTRATOR);

        $liham = User::factory()->create([
            'name' => 'liham',
            'email' => 'liham@example.com',
        ]);

        $liham->assignRole(DefaultRoles::ADMINISTRATOR);


        $zeno = User::factory()->create([
            'name' => 'zeno',
            'email' => 'zeno@example.com',
        ]);

        $zeno->assignRole(DefaultRoles::USER);
    }
}
