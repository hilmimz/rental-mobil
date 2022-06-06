<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Armada>
 */
class ArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    function randomizePlatNomor(){
        $result = '';
        $result = $this->faker->randomElement(['AD', 'AB', 'B', 'A']);
        $result = $result . " " . strtoupper($this->faker->unique()->bothify('#### ??'));
        return $result;
    }


    public function definition()
    {
        return [
            'merk_id' => $this->faker->numberBetween(1, 5),
            'jenis' => $this->faker->randomElement(['Alphard', 'Ertiga', 'Fortuner', 'HRV', 'Kijang Innova']),
            'plat_nomor' => $this->faker->unique()->regexify('(AD|AB|A|B) [1-9][0-9]{3} [A-Z]{2}'),
            'transmisi' => $this->faker->randomElement(['Matic', 'Manual']),
            'tgl_pajak' => $this->faker->dateTimeBetween('+1 year', '+6 year'),
            'thn_beli' => $this->faker->numberBetween(2010, 2021),
            'harga_tiga_jam' => $this->faker->numberBetween(6, 15) * 10000,
            'tersedia' => $this->faker->boolean(),
            'bahan_bakar' => $this->faker->randomElement(['Solar', 'Bensin'])
        ];
    }
}
