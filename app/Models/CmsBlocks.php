<?php

namespace App\Models;

use App\Models\Cms;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CmsBlocks extends Model
{
    use HasFactory;
    protected $fillable = ['cms_id', 'home_story', 'our_mission'];


    public function cms()
    {
        return $this->belongsTo(Cms::class);
    }
}
