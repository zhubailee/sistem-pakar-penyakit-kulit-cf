<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $fillable = [
        'nama',
        'tanggal',
        'penyakit',
        'gejala',
        'idpenyakit',
        'nilai',
    ];
    use HasFactory;
}
