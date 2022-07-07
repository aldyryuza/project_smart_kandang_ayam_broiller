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
        Schema::create('master_kandang', function (Blueprint $table) {
            $table->id();
            $table->string('alamat_kandang');
            $table->foreignId('mac')->constrained('tabel_iot')->cascadeOnDelete();
            $table->integer('populasi_ayam');
            $table->integer('umur_ayam');
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
        Schema::dropIfExists('master_kandang');
    }
};
