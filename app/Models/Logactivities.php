<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logactivities extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pembayaranPetugas()
    {
        return $this->belongsTo(Pembayaran::class, 'pembayaran_id', 'id');
    }
}
