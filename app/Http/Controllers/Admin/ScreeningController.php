<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;

class ScreeningController extends Controller
{
    public function __construct()
    {

    }
    /**********Admin *******************/
    public function landlordPropertyScreening(Request $request)
    {
        try {
            $properties = Property::whereHas('landlord', function ($query) {
                $query->where(['role_id' => 2, 'status' => 1, 'is_deleted' => 0]);
            })->get();
            $data['properties'] = $properties->isNotEmpty() ? $properties : [];

            if ($request->isMethod('post')) {

            }
            return View('admin.screening.landlord')->with($data);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();

        }

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

    public function PropertyScreening(Request $request)
    {
        try {

            $property_id = $request->property_id;
            $property = Property::find($property_id);
            if (!empty($property)) {
                $property->screening_status = '1';
                if ($property->save()) {
                    return redirect()->back() // Replace 'desired.route' with your actual route name
                        ->with('success', 'Property Sent for screening Successfully. Please wait untill Admin Update the status');

                } else {
                    return redirect()->back() // Replace 'desired.route' with your actual route name
                        ->with('error', 'Please try later for screening as might be some technical issues');
                }

            } else {
                return redirect()->back()->with('error', 'Sorry, Property Not found.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();

        }
    }

    /**********Landlord *******************/
}
