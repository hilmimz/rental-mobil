<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Armada;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    // function generateArmada(){
    //     Armada::create([
    //         'jenis' => '',
    //         'plat_nomor' => '',
    //         'transmisi' => ''
    //     ]);
    // }


    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Armada::factory(30)->create();
    }
}
