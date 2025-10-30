<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelKomentar extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'forum_id',
        'komentar',
    ];
}
