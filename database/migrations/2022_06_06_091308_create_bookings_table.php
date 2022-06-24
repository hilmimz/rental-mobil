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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id');
            $table->date('tgl_transaksi');
            $table->integer('rental_total');
            $table->integer('denda_total');
            $table->integer('harga_total');
            $table->integer('sisa_pembayaran');
            $table->string('status_pembayaran');
            $table->string('status_pengembalian');
            $table->string('status');
            $table->string('no_invoice', 20)->unique();
            $table->text('keterangan')->nullable();
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
        Schema::dropIfExists('bookings');
    }
};
