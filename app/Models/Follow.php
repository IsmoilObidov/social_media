<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;


    protected $fillable = [
        'id',
        'user_id',
        'follow_id',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    function get_user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
