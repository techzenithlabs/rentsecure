<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'landlord_id',
        'street_address',
        'apartment',
        'amount',
        'province',
        'date_available',
        'zipcode',
        'property_images',
        'status', // Include the new field status
        'is_verified',
        'is_deleted', // Include the new field is_deleted
        'deleted_by', // Include the new field deleted_by
        'screening_status', //Include screening statusforproperty
        'uploaded_report', //Uploaded reporets for approved property after screening
    ];

    public function landlord()
    {
        return $this->belongsTo(User::class, 'landlord_id');
    }

}
