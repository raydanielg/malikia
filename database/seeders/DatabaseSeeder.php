<?php

namespace Database\Seeders;

use App\Models\User;
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

        // Optional: seed a demo user only if not exists
        // \App\Models\User::firstOrCreate(
        //     ['email' => 'test@example.com'],
        //     ['name' => 'Test User', 'password' => bcrypt('password')]
        // );

        $this->call([
            TestimonialSeeder::class,
        ]);
    }
}
