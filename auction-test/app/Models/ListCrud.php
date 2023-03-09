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
}
