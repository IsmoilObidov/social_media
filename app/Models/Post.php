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

    function get_like($user_id, $post_id)
    {
        return Like::where('user_id', $user_id)->where('post_id', $post_id)->exists();
    }
}
