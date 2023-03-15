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
        Schema::create('tb_lelang', function (Blueprint $table) {
            $table->increments('id_lelang');
            $table->integer('id_barang');
            $table->string('nama_barang');
            $table->date('tanggal_lelang');
            $table->integer('harga_akhir');
            $table->string('user_name');
            $table->string('auctioneer');
            $table->string('status');
            $table->string('lots');
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
        Schema::dropIfExists('tb_lelang');
    }
};
