<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'table_dosen';

    protected $fillable = [
        'Fullname',
        'NIP',
        'NIDN',
        'Pendidikan_Terakhir',
        'Jurusan_id',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Alamat',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'Jurusan_id', 'id');
    }
}