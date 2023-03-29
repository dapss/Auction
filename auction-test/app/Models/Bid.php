<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_bid';
    protected $guarded = ['id_bid'];
    protected $table = 'tb_bid_history';

    public function barang()
    {
        return $this->belongsTo(ListCrud::class, 'id_barang');
    }
}
