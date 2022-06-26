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
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_armada_id');
            $table->dateTime('waktu_pengembalian');
            $table->string('kondisi');
            $table->integer('durasi_telat');
            $table->integer('denda');
            $table->text('keterangan')->nullable();
            $table->string('created_by')->default('ivandrafawwaz@gmail.com');
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
        Schema::dropIfExists('pengembalians');
    }
};
