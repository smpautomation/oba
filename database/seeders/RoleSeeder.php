<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'user', 'description' => 'Regular User']);
        Role::create(['name' => 'admin', 'description' => 'Administrator']);
        Role::create(['name' => 'auditor', 'description' => 'Auditor']);
    }
}
