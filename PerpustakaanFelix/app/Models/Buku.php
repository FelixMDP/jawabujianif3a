<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'idbuku',
        'judul_buku',
        'penerbit',
        'pengarang',
        'jumlah',
    ];
}
