<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'title',
        'category',
        'content',
        'slug', // Add slug to fillable if you intend to use it
    ];

    // Automatically generate slug from the title before creating a post
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            if (empty($post->slug)) {
                $post->slug = Str::slug($post->title); // Automatically generate slug from title
            }
        });
    }
}
