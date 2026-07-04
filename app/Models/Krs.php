<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'krs';

    protected $fillable = [
        'kode_mahasiswa',
        'tahun_ajaran',
        'semester',
        'status',
        'total_sks'
    ];
}