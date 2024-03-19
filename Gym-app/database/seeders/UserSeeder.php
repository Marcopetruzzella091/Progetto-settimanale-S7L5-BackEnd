<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'], // Cerca un utente con questo indirizzo email
            [
                'name' => 'Admin',
                'password' => Hash::make('Pa$$w0rd!'),
                'role' => 'admin'
            ]
        );
        User::factory(10)->create();
    }
}