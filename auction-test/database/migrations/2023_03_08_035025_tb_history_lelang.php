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
        Schema::create('tb_history_lelang', function (Blueprint $table) {
            $table->increments('id_history');
            $table->string('nama_barang');
            $table->integer('penawaran_harga');
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
        Schema::dropIfExists('tb_history_lelang');
    }
};
