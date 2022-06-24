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

    private $jenisArrays = [
        [ //Datsun
            'Karimun'
        ],
        [ //Suzuki
            'Ertiga',
            'APV'
        ],
        [   //Toyota
            'Kijang Innova',
            'Alphard',
            'Fortuner'
        ],
        [ //Nissan
            'Livina',
            'Juke'
        ]
    ];


    function getJenisArmada($merk_id)
    {
        $jenisArr = $this->jenisArrays[$merk_id - 1];
        $rand = $this->faker->numberBetween(1, count($jenisArr));
        
        $jenis = $jenisArr[$rand - 1];
        return $jenis;
    }


    function randomizePlatNomor(){
        $result = '';
        $result = $this->faker->randomElement(['AD', 'AB', 'B', 'A']);
        $result = $result . " " . strtoupper($this->faker->unique()->bothify('#### ??'));
        return $result;
    }


    public function definition()
    {
        $totalMerk = count($this->jenisArrays);
        $merk_id = $this->faker->numberBetween(1, $totalMerk);
        return [
            'merk_id' => $merk_id,
            'jenis' => $this->getJenisArmada($merk_id),
            'plat_nomor' => $this->faker->unique()->regexify('(AD|AB|A|B) [1-9][0-9]{3} [A-Z]{2}'),
            'transmisi' => $this->faker->randomElement(['Matic', 'Manual']),
            'tgl_pajak' => $this->faker->dateTimeBetween('+1 year', '+6 year'),
            'thn_beli' => $this->faker->numberBetween(2010, 2021),
            'harga_tiga_jam' => $this->faker->numberBetween(6, 15) * 10000,
            'tersedia' => true, //default is true           //(rand(1,100) >= 75) ? true : false,
            'bahan_bakar' => $this->faker->randomElement(['Solar', 'Bensin'])
        ];
    }
}
