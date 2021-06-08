<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeretasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public $timestamps = false;
    public function up()
    {
        Schema::create('keretas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kereta');
            $table->integer('jumlah_kursi');
            $table->string('stasiun_asal');
            $table->string('stasiun_tujuan');
            $table->time('jam_keberangkatan');
            $table->time('jam_tiba');
            $table->string('gerbong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kereta');
    }
}
