<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'table_mahasiswa';

    protected $fillable = [
        'user_id',
        'Fullname',
        'NIM',
        'NIDN',
        'Tempat_Lahir',
        'Tanggal_Lahir',
        'Alamat',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function krs()
    {
        return $this->hasMany(Krs::class, 'kode_mahasiswa');
    }
}