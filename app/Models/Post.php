<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = "posts";
    
    protected $fillable = [
        'title',
        'slug',
        'cover',
        'likes',
        'content'
    ];

    protected $hidden = [
        'id'
    ];

    protected $casts = [
        'likes' => "integer"
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id');
    }
}


# Model Attribute