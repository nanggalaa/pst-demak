<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Select;

class Kunjungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'pendidikan',
        'tanggal',
        'pekerjaan',
        'jenis_kelamin',
        'instansi',
        'email',
        'pemanfaatan',
        'tahun_lahir',
        'layanan',
        'umur',
        'data_diinginkan',
        'alamat',
    ];
}
