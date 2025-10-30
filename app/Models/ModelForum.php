<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelForum extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_forums';

    protected $fillable = [
        'user_id',
        'nama_forum',
        'deskripsi',
        'gambar',
        'durasi',
        'waktu_berakhir',
    ];

    public function user()
    {
        return $this->belongsTo(user::class, 'user_id');
    }
}
