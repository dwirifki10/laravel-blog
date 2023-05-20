<?php

namespace App\Models;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    public function postDetail() {
        return $this->hasMany(Post::class, "post_id", "id");
    }

    public function commentDetail() {
        return $this->hasMany(Comment::class, "comment_id", "id");
    }
}
