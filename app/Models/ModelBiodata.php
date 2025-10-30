<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelBiodata extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_biodatas';

    protected $fillable = [
        'nama',
        'user_id',
        'angkatan_id',
        'jenis_kelamin',
        'tempat',
        'tanggal_lahir',
        'tahun_lulus',
        'pekerjaan',
        'no_telp',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }

    public function angkatan()
    {
        return $this->belongsTo(ModelAngkatan::class, 'angkatan_id');
    }
}
