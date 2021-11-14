<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function postComment(){
        // just having one post
       return $this->belongsTo(Post::class, 'post_id', 'id');
    }

    public function userComment(){
        // just having one user
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function child(){
        // having many comments
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }
}
