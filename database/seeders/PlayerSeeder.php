<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    public function run(): void
    {
        $maleNames = [
            'Rizki',
            'Budi',
            'Dimas',
            'Fajar',
            'Ahmad',
            'Agus',
            'Hendra',
            'Putra',
            'Yoga',
            'Eko',
            'Bayu',
            'Andi',
            'Arif',
            'Rian',
            'Ilham',
            'Doni',
            'Rafi',
            'Farhan',
            'Iqbal',
            'Reza',
        ];

        $femaleNames = [
            'Ayu',
            'Siti',
            'Putri',
            'Dewi',
            'Nabila',
            'Intan',
            'Rina',
            'Fitri',
            'Lestari',
            'Nia',
            'Anisa',
            'Maya',
            'Dinda',
            'Tasya',
            'Aulia',
            'Citra',
            'Ratna',
            'Novi',
            'Sarah',
            'Yuni',
        ];

        // === LAKI-LAKI (L) ===
        foreach ($maleNames as $i => $name) {
            Player::create([
                'name'   => $name . ' ' . fake()->lastName(),
                'gender' => 'L',
                'phone'  => $this->indonesianPhone(),
                'email'  => strtolower($name) . ($i + 1) . '@gmail.com',
                'avatar' => 'dummy/l' . ($i + 1) . '.png'
            ]);
        }

        // === PEREMPUAN (P) ===
        foreach ($femaleNames as $i => $name) {
            Player::create([
                'name'   => $name . ' ' . fake()->lastName(),
                'gender' => 'P',
                'phone'  => $this->indonesianPhone(),
                'email'  => strtolower($name) . ($i + 1) . '@gmail.com',
                'avatar' => 'dummy/p' . ($i + 1) . '.png',
            ]);
        }
    }

    protected function indonesianPhone(): string
    {
        $prefixes = ['0811', '0812', '0813', '0821', '0822', '0823', '0851', '0852', '0853', '0877', '0878'];

        return fake()->randomElement($prefixes)
            . fake()->numerify('########');
    }
}
