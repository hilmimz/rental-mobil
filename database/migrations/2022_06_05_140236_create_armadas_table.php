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
        Schema::create('armadas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('merk_id');
            $table->string('jenis', 20);
            $table->string('plat_nomor', 20)->unique();
            $table->string('transmisi', 20);
            $table->date('tgl_pajak');
            $table->integer('thn_beli');
            $table->integer('harga_tiga_jam');
            $table->boolean('tersedia');
            $table->string('bahan_bakar', 20);
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
        Schema::dropIfExists('armadas');
    }
};
