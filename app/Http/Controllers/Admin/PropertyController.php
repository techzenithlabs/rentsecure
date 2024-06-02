<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function __construct()
    {

    }

    /**********Admin **********/

    public function landLordProperty()
    {
        return View('admin.properties.landlord');

    }
    /**********Admin **********/

    /**********Land Lord **********/
    public function myProperty()
    {
        return View('landlord.properties');
    }

    public function Pricing()
    {
        return View('landlord.pricing');
    }
    /**********Land Lord **********/

}
