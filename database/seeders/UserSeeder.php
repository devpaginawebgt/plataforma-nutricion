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
            'lastname' => 'Herrera',
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

        $douglas = User::create([
            'name'     => 'Douglas',
            'lastname' => 'Alvarado',
            'email'    => 'soporte@paginawebguatemala.com',
            'password' => Hash::make('FScomunica2'),
        ]);
        $douglas->assignRole('nutritionist');

        $andrea = User::create([
            'name'     => 'Andrea',
            'lastname' => 'Dieguez',
            'email'    => 'andreadieguez@gmail.com',
            'password' => Hash::make('pwg502'),
        ]);
        $andrea->assignRole('nutritionist');

        $patient = User::create([
            'name'     => 'Oliver',
            'lastname' => 'Bonilla',
            'email'    => 'oliver@gmail.com',
            'password' => Hash::make('pwg502'),
        ]);
        $patient->assignRole('patient');
    }
}
