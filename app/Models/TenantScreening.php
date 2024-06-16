<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantScreening extends Model
{
    use HasFactory;

    protected $table = 'tenant_screening';

    protected $fillable = [
        'landlord_id',
        'tenant_id',
        'country',
        'paymentinfo',
        'firstname',
        'middlename',
        'lastname',
        'sin',
        'dob',
        'address',
    ];


    protected static function booted()
    {
        static::deleting(function ($tenantScreening) {
            // Delete related tenant if exists
            if ($tenantScreening->tenant) {
                $tenantScreening->tenant->delete();
            }
        });
    }
}
