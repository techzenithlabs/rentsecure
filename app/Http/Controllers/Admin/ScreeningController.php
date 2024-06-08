<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

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

    public function viewDocuments($user_id)
    {
        try {
            $data = [];
            $user = User::findOrFail($user_id);
            $data['documents'] = !empty($user->documents) ? $user->documents : [];
            return View('admin.properties.landlord-documents')->with($data);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();
        }
    }
    /**********Admin *******************/

    /**********Landlord *******************/

    public function landlordtenantScreening()
    {
        return View('landlord.tenant-screening');

    }

    /**********Landlord *******************/
}
