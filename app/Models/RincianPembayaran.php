<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RincianPembayaran extends Model
{
    use HasFactory;

    protected $table = 'rincian_pembayaran';

    protected $primaryKey = 'id_rincian_pembayaran';

    public $timestamps = false;
}
