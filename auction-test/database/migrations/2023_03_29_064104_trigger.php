<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER tb_bid
        AFTER UPDATE ON tb_lelang
        FOR EACH ROW BEGIN 
        INSERT INTO tb_bid_history (id_barang, nama_barang, tanggal_lelang, 
        harga_akhir, user_name, auctioneer) 
        VALUES (OLD.id_barang, OLD.nama_barang, OLD.tanggal_lelang, 
        OLD.harga_akhir, OLD.user_name, OLD.auctioneer); 
        END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_bid_history', function (Blueprint $table) {
            //
        });
    }
};