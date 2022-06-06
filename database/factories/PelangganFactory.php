<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $nama = '';
        // $jenis_kelamin = false;
        // if(mt_rand(0,1) > 0){
        //     // $nama = $this->faker->name_male();
        //     $jenis_kelamin = true;
        // } else {
        //     // $nama = $this->faker->name_female();
        //     $jenis_kelamin = false;
        // }
        $jenis_kelamin = $this->faker->randomElement(['L', 'P']);
        $alamats = ['Jebres', 'Joyosuran', 'Gajahan', 'Semanggi', 'Mojosongo'];

        return [
            'nik' => $this->faker->unique()->nik(),
            'nama' => $this->faker->name(($jenis_kelamin=='L')?'male':'female'),
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $this->faker->dateTimeBetween('-28 year', '-17 year'),
            'alamat' => $this->faker->randomElement($alamats),
            'no_telepon' => $this->faker->unique()->regexify('08(12|21|57|96|17)[0-9]{8}')
        ];
    }
}
