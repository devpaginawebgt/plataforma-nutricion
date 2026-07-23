<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dennis = User::create([
            'name' => 'Dennis',
            'email' => 'dev@paginawebguatemala.com',
            'password' => Hash::make('FScomunica2'),
        ]);
        $dennis->assignRole('nutritionist');

        $douglas = User::create([
            'name' => 'Douglas',
            'email' => 'soporte@paginawebguatemala.com',
            'password' => Hash::make('FScomunica2'),
        ]);
        $douglas->assignRole('nutritionist');

        $patient = User::create([
            'name' => 'Oliver Bonilla',
            'email' => 'oliver@gmail.com',
            'password' => Hash::make('FScomunica2'),
        ]);
        $patient->assignRole('patient');
    }
}
