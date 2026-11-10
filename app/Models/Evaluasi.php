<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluasi extends Model
{
    protected $fillable = [
        'pegawai_id',
        'pengunjung_id',
        'rating',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function pengunjung()
    {
        return $this->belongsTo(Kunjungan::class);
    }
}
