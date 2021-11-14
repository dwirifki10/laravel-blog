<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $guarded = [];

     // Relationships
    public function postCategory(){
        // having many posts
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
