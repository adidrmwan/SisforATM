<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSingleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_atm');
            $table->string('lokasi');
            $table->string('pengelola');
            $table->string('denom');
            $tsble->string('');
            $table->string('');
            $table->string('');
            $table->string('');
            $table->date('bulan');
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
        Schema::dropIfExists('single');
    }
}
