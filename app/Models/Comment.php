<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'user_id',
        'post_id',
        'text',
        'deleted_at'
    ];
    function get_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
