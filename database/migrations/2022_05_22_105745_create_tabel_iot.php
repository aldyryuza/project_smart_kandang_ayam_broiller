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
        Schema::create('tabel_iot', function (Blueprint $table) {
            $table->id();
            $table->double('kelembapan');
            $table->double('suhu');
            $table->double('amonia');
            $table->enum('relay1', [1, 0]);
            $table->enum('relay2', [1, 0]);
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
        Schema::dropIfExists('tabel__i_o_t');
    }
};
