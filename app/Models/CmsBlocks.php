<?php

namespace App\Models;

use App\Models\Cms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsBlocks extends Model
{
    use HasFactory;
    protected $fillable = [
        'cms_id',
        'hometoptitle',
        'hometopsubtitle',
        'home_top_file',
        'homesecondtitle',
        'home_second_content',
        'home_second_file',
        'homethirdtitle',
        'home_third_content',
        'home_third_file',
        'home_third_block',
        'home_testimonial_desc',
        'home_testimonial_star',
        'home_testimonial_author',
        'home_testimonial_desg',
        'home_testimonial_pic',
        'homefifthtitle',
        'home_fifth_content',
        'home_fifth_file',
        'homesixthtitle',
        'home_sixth_content',
        'home_sixth_file',
        'homefaqtitle',
        'homefaqdesc',
        'home_story',
        'our_mission',
        'our_mission_image',
        'blog_title',
        'blog_img',
        'blog_desc',
        'mobile_usa',
        'mobile_uk',
        'contact_email',
        'faq_title',
        'faq_desc',
        'created_at',
        'updated_at',
    ];

    public function cms()
    {
        return $this->belongsTo(Cms::class);
    }
}
