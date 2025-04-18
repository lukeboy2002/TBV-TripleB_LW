<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()
            ->create([
                'username' => 'admin',
                'email' => 'admin@tbv-tripleb.nl',
                'email_verified_at' => now(),
                'password' => Hash::make('adminadmin'),
                'remember_token' => Str::random(10),
            ]);

        User::factory(10)->create();
    }
}
