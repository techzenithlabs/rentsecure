<?php

namespace App\Models;

use App\Models\CmsBlocks;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cms extends Model
{
    use HasFactory;
    protected $fillable = ['page_name', 'slug', 'description', 'status', 'created_at', 'updated_at'];

    public function blocks()
    {
        return $this->hasOne(CmsBlocks::class, 'cms_id', 'id');
    }
}
