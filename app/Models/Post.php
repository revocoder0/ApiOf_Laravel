<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Foundation\Auth\User;

class Post extends Model
{
    use HasFactory;
    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // User
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    // Tags
    public function tags()
    {
        return $this->belongsToMany(Tags::class, 'post_tags')->withPivot('post_id', 'tags_id');
    }
}
