<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListCrud extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_barang';
    protected $guarded = ['id_barang'];
    protected $table = 'tb_barang';


    public function lelang()
    {
        return $this->hasMany(Lelang::class, 'id_barang');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'id_barang');
    }

    public function bid()
    {
        return $this->hasMany(History::class, 'id_barang');
    }
}