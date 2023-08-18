<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'SB SAJIB',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
        ]);
        Customer::factory(200)->create();
        Post::factory(200)->create();
    }
}
