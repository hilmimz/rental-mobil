<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Pelanggan;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $pelangganCount = Pelanggan::all()->count();

        return [
            'pelanggan_id' => $this->faker->numberBetween(1,20),
            'tgl_transaksi' => $this->faker->dateTimeBetween('-1 week', '-1 day'),
            'harga_total' => $this->faker->numberBetween(14, 100) * 50000,
            'status' => $this->faker->randomElement(['Lunas', 'Belum Lunas']),
            'no_invoice' => strtoupper($this->faker->bothify('####/??/##')),
            'keterangan' => $this->faker->optional()->sentence(3)
        ];
    }
}
 