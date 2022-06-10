<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookingArmada>
 */
class BookingArmadaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $waktu_mulai = $this->faker->dateTimeBetween('-1 day', '+10 day');
        $interval = idate('d', strtotime($waktu_mulai->format('Y-m-d'))) - idate('d', date('now')) + 2;
        $interval_plus = $interval + 2;
        $waktu_selesai = $this->faker->dateTimeBetween("+{$interval} day", "+{$interval_plus} day");
        $durasi_jam = $waktu_mulai->diff($waktu_selesai)->h;
        $durasi_hari = $waktu_mulai->diff($waktu_selesai)->d;
        $durasi_total = $durasi_hari * 24 + $durasi_jam;

        // $waktu_mulai = $faker->dateTimeBetween('-1 day', '+10 day');
        // $interval = idate('d', strtotime($waktu_mulai->format('Y-m-d'))); - idate('d', date('now')) + 2;
        // $interval_plus = $interval + 2;
        // $waktu_selesai = $faker->dateTimeBetween("+{$interval} day", "+{$interval_plus} day");
        // $durasi_jam = $waktu_mulai->diff($waktu_selesai)->h;
        // $durasi_hari = $waktu_mulai->diff($waktu_selesai)->d;
        // $durasi_total = $durasi_hari * 24 + $durasi_jam;


        return [
            'booking_id' => $this->faker->numberBetween(1,30),
            'armada_id' => $this->faker->numberBetween(1,30),
            'waktu_selesai' => $waktu_selesai,
            'waktu_mulai' => $waktu_mulai,
            'durasi_jam' => $durasi_total,
            'harga' => $this->faker->numberBetween(10, 90) * 50000,
            'status' => $this->faker->randomElement(['Selesai', 'Aktif'])
        ];
    }
}
