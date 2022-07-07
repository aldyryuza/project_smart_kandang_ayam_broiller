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
        Schema::create('rekap_harian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kandang')->constrained('master_kandang')->cascadeOnDelete();;
            $table->date('tanggal');
            $table->integer('ayam_mati');
            $table->integer('umur');
            $table->foreignId('id_pakan')->constrained('master_pakan');
            $table->integer('pakan_keluar');
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
        Schema::dropIfExists('rekap_harian');
    }
};
