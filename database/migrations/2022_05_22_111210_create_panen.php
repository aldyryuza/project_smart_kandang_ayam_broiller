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
        Schema::create('panen', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang')->constrained('master_kandang')->cascadeOnDelete();
            $table->date('tanggal');
            $table->integer('umur_panen');
            $table->integer('populasi_akhir');
            $table->integer('bobot_panen');
            $table->integer('harga_panen');
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
        Schema::dropIfExists('panen');
    }
};
