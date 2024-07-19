<?php

namespace App\Models;

use App\Models\CmsBlocks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
    protected $fillable = ['page_name', 'slug', 'description', 'status', 'top_blog_title', 'top_blog_image', 'top_blog_desc', 'bottom_blog_title', 'bottom_blog_image', 'bottom_blog_desc', 'about_us_image', 'created_at', 'updated_at'];

    public function blocks()
    {
        return $this->hasOne(CmsBlocks::class, 'cms_id', 'id');
    }
}
