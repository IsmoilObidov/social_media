<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'follower_id',
        'deleted_at',
    ];
    
    // function get_follower()
    // {
    //     return $this->hasOne(User::class, 'id', 'user_id');
    // }
}
