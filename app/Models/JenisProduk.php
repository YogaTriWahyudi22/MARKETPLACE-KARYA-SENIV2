<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;

    protected $table = 'jenis_karya_seni';

    protected $primaryKey = 'id_jenis';

    public $timestamps = false;
}
