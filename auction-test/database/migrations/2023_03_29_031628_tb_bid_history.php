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
        Schema::create('tb_bid_history', function (Blueprint $table) {
            $table->increments('id_bid');
            // $table->integer('id_barang', 10)->unsigned();
            $table->unsignedInteger('id_barang');
            $table->foreign('id_barang')->references('id_barang')->on('tb_barang')->onDelete('cascade');
            $table->string('nama_barang');
            $table->integer('harga_akhir');
            $table->string('user_name');
            $table->string('auctioneer');
            $table->date('tanggal_lelang');
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
        Schema::dropIfExists('tb_bid_history');
    }
};