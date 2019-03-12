<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('terminal_id')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('vendor')->nullable();
            $table->string('area')->nullable();
            $table->string('tipe')->nullable();
            $table->string('tanggal')->nullable();
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
        Schema::dropIfExists('atms');
    }
}
