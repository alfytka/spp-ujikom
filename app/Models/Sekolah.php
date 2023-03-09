<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    protected $fillable = ['kepala_sekolah', 'nip', 'nama_sekolah', 'telepon', 'alamat'];
}
