<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Enumeration\UserRoles;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Nigel Heap',
            'email' => 'nigel.c.heap@gmail.com',
            'role' => UserRoles::SUPER->name,
            'password'=> Hash::make('secret'),
        ]);
    }
}
