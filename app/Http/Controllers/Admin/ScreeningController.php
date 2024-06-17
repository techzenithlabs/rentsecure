<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\TenantScreeningEmail;
use App\Models\Property;
use App\Models\TenantScreening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

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

    public function landlordtenantScreening(Request $request, $step = null)
    {
        $data = [];
        if ($step === null) {
            // Handle the case when no step is provided
            return view('landlord.tenant-screening.step1');
        }
        $landlord_id = Auth::user()->id;

        switch ($step) {
            case 'step1':
                if ($request->isMethod('post')) {

                }
                if (Session::has('paymentinfo')) {
                    $data['paymentinfo'] = Session::get('paymentinfo');

                }
                return view('landlord.tenant-screening.step1')->with($data);
            case 'step2':
                if ($request->isMethod('post')) {

                    $paymentType = !empty($request->paymentinfo) ? $request->paymentinfo : "landlord";
                    if (!empty($paymentType)) {
                        Session::put('paymentinfo', $paymentType);
                    } else {
                        Session::forget('paymentinfo');
                    }

                }
                if (Session::has('country')) {
                    $data['country'] = Session::get('country');

                }

                return view('landlord.tenant-screening.step2')->with($data);
            case 'step3':
                if ($request->isMethod('post')) {
                    $country = !empty($request->country) ? $request->country : "";

                    if (!empty($country)) {
                        Session::put('country', $country);
                    } else {
                        Session::forget('country');
                    }

                }

                if (Session::has('paymentinfo')) {
                    $data['paymentinfo'] = Session::get('paymentinfo');

                }

                if (Session::has('country')) {
                    $data['country'] = Session::get('country');

                }

                if (Session::has('firstname')) {
                    $data['firstname'] = Session::get('firstname');
                }

                if (Session::has('middlename')) {
                    $data['middlename'] = Session::get('middlename');
                }

                if (Session::has('lastname')) {
                    $data['lastname'] = Session::get('lastname');
                }

                if (Session::has('sin')) {
                    $data['sin'] = Session::get('sin');
                }

                if (Session::has('dob')) {
                    $data['dob'] = Session::get('dob');
                }

                if (Session::has('address')) {
                    $data['address'] = Session::get('address');
                }

                if (Session::has('applicant_confirm')) {
                    $data['applicant_confirm'] = Session::get('applicant_confirm');
                }

                if (Session::has('applicant_consignment')) {
                    $data['applicant_consignment'] = Session::get('applicant_consignment');
                }

                return view('landlord.tenant-screening.step3')->with($data);
            case 'step4':
                if ($request->isMethod('post')) {
                    $allinfo = $request->all();

                    if (!empty($allinfo)) {
                        Session::put('paymentinfo', $allinfo['paymentinfo']);
                        Session::put('country', $allinfo['country']);
                        Session::put('firstname', $allinfo['firstname']);
                        Session::put('lastname', $allinfo['lastname']);
                        Session::put('sin', $allinfo['sin']);
                        Session::put('middlename', $allinfo['middlename']);
                        Session::put('dob', $allinfo['dob']);
                        Session::put('address', $allinfo['address']);
                        Session::put('applicant_confirm', $allinfo['applicant_confirm']);
                        Session::put('applicant_consignment', $allinfo['applicant_consignment']);
                    }

                }

                $getproperties = Property::where('landlord_id', $landlord_id)
                    ->select('id', 'street_address')
                    ->get();
                $properties = [];
                if (!empty($getproperties)) {
                    foreach ($getproperties as $prop) {
                        $properties[] = [
                            'id' => $prop->id,
                            'address' => $prop->street_address,
                        ];
                    }

                }

                $data['properties'] = !empty($properties) ? $properties : [];

                if (Session::has('paymentinfo')) {
                    $data['paymentinfo'] = Session::get('paymentinfo');

                }

                if (Session::has('country')) {
                    $data['country'] = Session::get('country');

                }

                if (Session::has('firstname')) {
                    $data['firstname'] = Session::get('firstname');
                }

                if (Session::has('middlename')) {
                    $data['middlename'] = Session::get('middlename');
                }

                if (Session::has('lastname')) {
                    $data['lastname'] = Session::get('lastname');
                }

                if (Session::has('sin')) {
                    $data['sin'] = Session::get('sin');
                }

                if (Session::has('dob')) {
                    $data['dob'] = Session::get('dob');
                }

                if (Session::has('address')) {
                    $data['address'] = Session::get('address');
                }

                if (Session::has('applicant_confirm')) {
                    $data['applicant_confirm'] = Session::get('applicant_confirm');
                }

                if (Session::has('applicant_consignment')) {
                    $data['applicant_consignment'] = Session::get('applicant_consignment');
                }

                return view('landlord.tenant-screening.step4')->with($data);
            default:
                // Handle invalid step or redirect to a default step
                return redirect()->route('landlord.screening.tenant', ['step' => 'step1']);
        }

    }

    public function tenantScreeningSubmission(Request $request)
    {
        try {
            if ($request->ajax()) {
                $formData = (object) $request->all();

                $landlord_id = Auth::user()->id;
                $landlorddetail = User::where(['id' => $landlord_id, 'role_id' => 2])->first();

                $tenantscreening = new TenantScreening();
                $tenantscreening->landlord_id = $landlorddetail->id;
                $tenantscreening->property_id = $formData->landlord_property ?? '';
                $tenantscreening->tenant_first_name = $formData->tenant_first_name ?? '';
                $tenantscreening->tenant_last_name = $formData->tenant_last_name ?? '';
                $tenantscreening->tenant_email = $formData->tenant_email ?? '';
                $tenantscreening->country = $formData->country ?? '';
                $tenantscreening->paymentinfo = $formData->paymentinfo ?? '';
                $tenantscreening->firstname = $formData->firstname ?? '';
                $tenantscreening->middlename = $formData->middlename ?? '';
                $tenantscreening->lastname = $formData->lastname ?? '';
                $tenantscreening->sin = $formData->sin ?? '';
                $tenantscreening->dob = $formData->dob ?? '';
                $tenantscreening->address = $formData->address ?? '';
                if ($tenantscreening->save()) {
                    Mail::to($tenantscreening->tenant_email)->send(new TenantScreeningEmail($tenantscreening));

                    $response = [
                        'status' => 1,
                        'message' => "Screening information Saved Successfully",
                    ];
                    return response()->json($response, 200);
                } else {
                    $response = [
                        'status' => 0,
                        'message' => "There mihght be some technical error,please try again or contact admin",
                    ];
                    return response()->json($response, 200);

                }

            }

        } catch (\Exception $e) {
            $response = [
                'status' => 0,
                'message' => $e->getMessage(),
            ];
            return response()->json($response, 500);
        }

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
