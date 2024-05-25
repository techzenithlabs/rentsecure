<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function __construct()
    {

    }

    public function landLordProperty()
    {
        return View('admin.properties.landlord');

    }

}
