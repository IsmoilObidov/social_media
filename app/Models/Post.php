<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'photo', 'text', 'is_commentable', 'user_id'
    ];

    function get_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
