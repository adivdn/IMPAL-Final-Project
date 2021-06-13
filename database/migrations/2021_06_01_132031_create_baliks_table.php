<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaliksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baliks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departures_id')->constrained('departures');
            $table->string('stasiun_asal');
            $table->string('stasiun_tujuan');
            $table->date('jadwal');
            $table->integer('adult');
            $table->integer('child')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baliks');
    }
}
