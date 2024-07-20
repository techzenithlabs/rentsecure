<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'content', 'image_url', 'top_blog_title', 'top_blog_image', 'top_blog_desc', 'bottom_blog_title', 'bottom_blog_image', 'bottom_blog_desc', 'footer_blog_title', 'footer_blog_image', 'footer_blog_desc'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
