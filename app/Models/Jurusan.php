<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusan';

    protected $fillable = [
        'Nama_Jurusan',
        'Kode_Jurusan',
    ];

    public function dosens()
    {
        return $this->hasMany(Dosen::class, 'Jurusan_id', 'id');
    }
}