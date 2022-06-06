<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pembayaran>
 */
class PembayaranFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'booking_id' => $this->faker->numberBetween(1,30),
            'tgl_pembayaran' => $this->faker->dateTimeBetween('-1 week', 'now'),
            'jumlah_bayar' => $this->faker->numberBetween(1,50) * 50000,
            'cara_pembayaran' => $this->faker->randomElement(['Transfer', 'Cash']),
            'tipe_pembayaran' => $this->faker->randomElement(['DP', 'Pelunasan'])
        ];
    }
}
