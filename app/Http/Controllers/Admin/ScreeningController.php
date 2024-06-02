<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ScreeningController extends Controller
{
    public function __construct()
    {

    }
    /**********Admin *******************/
    public function landlordScreening()
    {
        return View('admin.screening.landlord');

    }

    public function tenantScreening()
    {
        return View('admin.screening.tenant');

    }
    /**********Admin *******************/

    /**********Landlord *******************/

    public function landlordtenantScreening()
    {
        return View('landlord.tenant-screening');

    }

    /**********Landlord *******************/
}
