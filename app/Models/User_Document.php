<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_Document extends Model
{
    use HasFactory;

    protected $table = 'user_documents';

    protected $fillable = [
        'user_id',
        'document_type',
        'documents',
        'expiry_date',
        'is_verified',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
