<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    protected $fillable = [
        'namapenyakit',
        'detailpenyakit',
        'solusi'
    ];
    use HasFactory;
}
