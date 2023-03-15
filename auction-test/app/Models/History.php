<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_history';
    protected $guarded = ['id_history'];
    protected $table = 'tb_history_lelang';
}
