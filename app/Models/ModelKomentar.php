<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModelKomentar extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_komentars'; // atau nama tabel yang kamu pakai

    protected $fillable = [
        'user_id',
        'forum_id',
        'komentar',
    ];

    public function post()
    {
        return $this->belongsTo(ModelForum::class, 'forum_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}