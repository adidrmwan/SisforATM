<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDriveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drive', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_atm')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('pengelola')->nullable();
            $table->date('jatuh_tempo')->nullable();
            $table->string('denom')->nullable();
            $table->string('performance')->nullable();
            $table->string('transaksi')->nullable();
            $table->string('feebased')->nullable();
            $table->string('ac')->nullable();
            $table->string('cctv')->nullable();
            $table->date('tanggal')->nullable();
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
        Schema::dropIfExists('drive');
    }
}
