<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lelang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_lelang';
    protected $guarded = ['id_lelang'];
    protected $table = 'tb_lelang';
}
