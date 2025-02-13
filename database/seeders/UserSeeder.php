<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(5)->create(); 

        User::insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'email' => 'john@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'email' => 'jane@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'email' => 'alice@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Brown',
                'email' => 'bob@example.com',
                'password' => Hash::make('password'),
            ],
            [
                'first_name' => 'Charlie',
                'last_name' => 'White',
                'email' => 'charlie@example.com',
                'password' => Hash::make('password'),
            ],
        ]);
    }
}
