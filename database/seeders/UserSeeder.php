<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'role' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('12345678'),
        ]);

        if(env('APP_ENV') == 'local') {
            
            User::factory(20)->create();
        }
    }
}
