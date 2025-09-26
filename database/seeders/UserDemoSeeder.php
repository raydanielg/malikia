<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'info@malkia.co.tz'],
            [
                'name' => 'Malkia Demo',
                'password' => Hash::make('12345678'),
            ]
        );
    }
}
