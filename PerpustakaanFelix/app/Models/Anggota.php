<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';
    protected $fillable = [
        'nama_anggota',
        'alamat',
        'jurusan',
        'tgl_daftar'
    ];
}
