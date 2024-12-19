<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class file1 extends Model
{
    use HasFactory;

protected  $fillable = [
'nama_file',
'generated_nama'
];

}
