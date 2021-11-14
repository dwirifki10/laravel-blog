<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stars extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function userStar(){
        // just having one user
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postStar(){
        // just having one post
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
