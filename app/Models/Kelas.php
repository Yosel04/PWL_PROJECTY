<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';

    protected $fillable = [
        'kode_kelas',
        'kode_mata_kuliah',
        'kode_dosen',
        'hari',
        'jam',
        'tahun_ajaran',
        'ruang_kelas',
        'jumlah_max',
        'semester'
    ];

    // Relasi ke dosen
    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'kode_dosen');
    }

    // Relasi ke mata kuliah
    public function matakuliah()
    {
        return $this->belongsTo(Matakuliah::class, 'kode_mata_kuliah');
    }
}