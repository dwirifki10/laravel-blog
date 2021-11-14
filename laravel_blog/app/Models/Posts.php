<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relationships
    public function userPost(){
        // just having one user
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function commentPost(){
        // having many posts
        return $this->hasMany(Comment::class, 'post_id', 'id')->whereNull('parent_id');
    }

    public function categoryPost(){
        // just having one category
        return $this->belongsTo(Categories::class, 'category_id', 'id');
    }

    public function starPost(){
        // having many stars
        return $this->hasMany(Star::class, 'post_id', 'id');
    }

}
