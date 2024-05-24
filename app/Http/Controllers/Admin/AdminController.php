<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function dashboard()
    {
        try {
            $user = Auth::user();
            $role = $user->role_id;
            switch ($role) {
                case 1: //SuperAdmin
                    return View('admin.dashboard');
                    break;
                case 2: //LandLord
                    return View('landlord.dashboard');
                    break;
                case 3: //Tenant
                    return View('tenant.dashboard');
                    break;

            }

        } catch (\Exception $e) {

        }

    }
}
