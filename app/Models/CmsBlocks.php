<?php

namespace App\Models;

use App\Models\Cms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsBlocks extends Model
{
    use HasFactory;
    protected $fillable = ['cms_id', 'home_story', 'our_mission', 'blog_title', 'blog_img', 'blog_desc', 'created_at', 'updated_at'];

    public function cms()
    {
        return $this->belongsTo(Cms::class);
    }
}
