<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PesakitFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'ic' => $this->faker->numerify('##########'),
            'jantina' => $this->faker->randomElement(['Lelaki', 'Perempuan']),
            'tarikh_lahir' => $this->faker->date('Y-m-d', '2005-01-01'),
            'telefon' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
            'gov_officer' => $this->faker->boolean(30), // ~30% penjawat awam
            'etnik' => $this->faker->randomElement(['Melayu', 'Cina', 'India', 'Bumiputera', 'Lain-lain']),
            'citizenship' => $this->faker->randomElement(['Malaysia', 'Bukan Warganegara']),
        ];
    }

}
