<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelAlumni extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'angkatan_id',
        'biodata_id',
        'npm',
        'tahun_lulus',
    ];
}
