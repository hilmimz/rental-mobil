<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Armada;
use App\Models\Merk;
use App\Models\Pelanggan;
use App\Models\Booking;
use App\Models\BookingArmada;
use App\Models\Pembayaran;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    function generateMerk(){
        Merk::create(['nama'=>'Datsun', 'produsen'=>'Jepang']);
        Merk::create(['nama'=>'BMW', 'produsen'=>'Jerman']);
        Merk::create(['nama'=>'Toyota', 'produsen'=>'Jepang']);
        Merk::create(['nama'=>'Honda', 'produsen'=>'Jepang']);
        Merk::create(['nama'=>'Mercedes-benz', 'produsen'=>'Jerman']);
    }


    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->generateMerk();
        Armada::factory(30)->create();
        Pelanggan::factory(50)->create();
        Booking::factory(30)->create();
        BookingArmada::factory(60)->create();
        Pembayaran::factory(60)->create();
    }
}
