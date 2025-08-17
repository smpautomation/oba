<?php

namespace Database\Seeders;

use App\Models\model_settings;
use App\Models\Sections;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        model_settings::factory(10)->create();
        Sections::factory(10)->create();
        $this->call([
            RoleSeeder::class,
        ]);
    }
}
