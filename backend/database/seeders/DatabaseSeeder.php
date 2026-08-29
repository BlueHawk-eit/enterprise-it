<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // The fixed-password demo accounts below (password: "password", including
        // an admin@enterpriseit.com.au admin account) are only ever created in
        // local/testing environments. Running this seeder in production used to
        // leave a guessable admin login on the live site — see
        // App\Console\Commands\CreateAdminUser for how to provision a real admin
        // account in production instead (php artisan app:create-admin).
        if (app()->environment(['local', 'testing'])) {
            // Seed Client user
            User::factory()->create([
                'name' => 'James Mitchell',
                'email' => 'client@example.com',
                'password' => bcrypt('password'),
                'organisation' => 'Acme Corporation',
                'account_type' => 'client',
            ]);

            // Seed Partner user
            User::factory()->create([
                'name' => 'Sarah Jenkins',
                'email' => 'partner@example.com',
                'password' => bcrypt('password'),
                'organisation' => 'Globex Logistics',
                'account_type' => 'partner',
            ]);

            // Seed Admin user
            User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@enterpriseit.com.au',
                'password' => bcrypt('password'),
                'organisation' => 'enterprise IT',
                'account_type' => 'admin',
            ]);
        }

        // Public marketing content (blog/news/sustainability articles) is safe
        // to seed in any environment.
        $this->call(ResourceSeeder::class);
    }
}
