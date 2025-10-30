<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelAngkatan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_angkatans';

    protected $fillable = [
        'angkatan',
    ];

    public function biodatas()
    {
        return $this->hasMany(ModelBiodata::class, 'angkatan_id');
    }
}
