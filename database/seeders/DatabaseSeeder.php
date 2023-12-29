<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        // Category::factory(10)->create();
        // Company::factory(10)->create();
        // Item::factory(10)->create();
        // Company::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ChildSeeder::class ,
            ItemSeeder::class , 
            RoleSeeder::class,
            PermissionSeeder::class
        
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'role_id'=> 1 ,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);
    }
}
