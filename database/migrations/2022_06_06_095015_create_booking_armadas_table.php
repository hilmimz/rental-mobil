<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_armadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id');
            $table->foreignId('armada_id');
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->integer('durasi_jam');
            $table->integer('harga');
            $table->string('status', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_armadas');
    }
};
