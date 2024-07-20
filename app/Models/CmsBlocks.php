<?php

namespace App\Models;

use App\Models\Cms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsBlocks extends Model
{
    use HasFactory;
    protected $fillable = ['cms_id', 'home_story', 'our_mission','our_mission_image', 'blog_title', 'blog_img', 'blog_desc', 'testimonial_pic', 'testimonial_desc', 'testimonial_star', 'testimonial_author', 'testimonial_desg', 'mobile_usa', 'mobile_uk', 'contact_email','faq_title','faq_desc', 'created_at', 'updated_at'];

    public function cms()
    {
        return $this->belongsTo(Cms::class);
    }
}
