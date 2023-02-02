<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kompetensiKeahlian()
    {
        return $this->belongsTo(Kompetensikeahlian::class, 'kompetensikeahlian_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'kelas_id', 'id');
    }
}
