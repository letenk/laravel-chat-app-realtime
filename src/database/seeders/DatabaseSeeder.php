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
        collect([
            [
                'name' => 'Jhon Doe',
                'username' => 'jhon_doe',
                'email' => 'jhon@gmail.com',
                'password' => bcrypt('password'),
            ],
              [
                'name' => 'Charly Deer',
                'username' => 'charly',
                'email' => 'charly@gmail.com',
                'password' => bcrypt('password'),
            ]
        ])->each(fn ($user) => User::create($user));
        
        User::factory(10)->create();

    }
}
