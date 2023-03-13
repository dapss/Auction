<?php

namespace App\Models;

use App\Models\ListCrud;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lelang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_lelang';
    protected $guarded = ['id_lelang'];
    protected $table = 'tb_lelang';


    public function user()
    {
        return $this->belongsTo(ListCrud::class);
    }

}

