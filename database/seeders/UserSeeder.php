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
            'name'     => 'Dennis',
            'lastname' => 'PWG',
            'email'    => 'dev@paginawebguatemala.com',
            'password' => Hash::make('FScomunica2'),
        ]);
        $dennis->assignRole('nutritionist');

        $erick = User::create([
            'name'     => 'Erick',
            'lastname' => 'M',
            'email'    => 'emunoz@paginawebguatemala.com',
            'password' => Hash::make('FScomunica2'),
        ]);
        $erick->assignRole('nutritionist');

        $andrea = User::create([
            'name'     => 'Paola',
            'lastname' => 'D',
            'email'    => 'paola@email.com',
            'password' => Hash::make('pwg502'),
        ]);
        $andrea->assignRole('nutritionist');

        $patient = User::create([
            'name'     => 'Oliver',
            'lastname' => 'Bonilla',
            'email'    => 'oliver@email.com',
            'password' => Hash::make('pwg502'),
        ]);
        $patient->assignRole('patient');
    }
}
