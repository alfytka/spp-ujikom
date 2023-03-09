<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function userPetugas()
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }
    
    public function userSiswa()
    {
        return $this->belongsTo(User::class, 'siswa_id', 'id');
    }

    public function logActivity()
    {
        return $this->hasMany(Logactivities::class, 'pembayaran_id', 'id');
    }
}
