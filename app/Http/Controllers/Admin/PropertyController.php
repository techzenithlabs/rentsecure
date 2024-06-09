<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PropertyController extends Controller
{
    public function __construct()
    {

    }

    /**********Admin **********/

    public function landLordProperty(Request $request)
    {
        try {
            $data = [];
            $properties = Property::whereHas('landlord', function ($query) {
                $query->where(['role_id' => 2, 'status' => 1, 'is_deleted' => 0]);
            })->get();
            $data['properties'] = $properties->isNotEmpty() ? $properties : [];

            if ($request->isMethod('post')) {

                $property_id = $request->property_id;
                $landlord_id = $request->landlord_id;

                $Property = Property::where(['id' => $property_id, 'landlord_id' => $landlord_id, 'status' => 1, 'is_deleted' => 0])->first();
                if (!empty($Property)) {
                    $Property->screening_status = '2';
                    if ($Property->save()) {
                        return redirect()->back()->with('success', "Property is Under Review..You can check necessary details and Update the status Accordingly")->withInput();
                    }
                } else {
                    return redirect()->back()->with('error', "Sorry, invalid property or it might have been deleted by the landlord")->withInput();
                }

            }
            return View('admin.properties.landlord')->with($data);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            return redirect()->back()->with('error', $errorMessage)->withInput();
        }

    }

    public function ScreeningStatus(Request $request)
    {
        try {
            $response = [];
            if ($request->ajax()) {
                $property_id = $request->property_id;
                $landlord_id = $request->landlord_id;
                $status = $request->status;

                $getproperties = Property::where(['landlord_id' => $landlord_id, 'id' => $property_id, 'status' => 1, 'is_deleted' => 0])->first();

                if (!empty($getproperties)) {
                    if ($status == "approve") {
                        $getproperties->screening_status = '3';
                        if ($getproperties->save()) {
                            $response = [
                                "status" => 1,
                                "message" => "You have approved the Property Screening",
                            ];
                            return response()->json($response, 200);

                        }

                    } else {
                        $getproperties->screening_status = '4';
                        if ($getproperties->save()) {
                            $response = [
                                "status" => 1,
                                "message" => "You have rejected the Property Screening",
                            ];
                            return response()->json($response, 200);

                        }

                    }

                } else {
                    $response = [
                        "status" => 0,
                        "message" => "Sorry invalid Property or Have been Deleted by Landlord",
                    ];
                    return response()->json($response, 200);

                }

            }

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $response = [
                "status" => 0,
                "message" => $errorMessage,
            ];
            return response()->json($response, 500);
        }
    }

    public function uploadDocuments(Request $request)
    {
        try {
            $response = [];
            if ($request->ajax()) {
                $property_id = $request->property_id;
                $landlord_id = $request->landlord_id;
                $file = $request->file('upload-report');
                $directory = 'public/document_uploaded/approved_documents';
                if (!Storage::exists('public/document_uploaded/approved_documents')) {
                    // If the directory does not exist, create it
                    Storage::makeDirectory('public/document_uploaded/approved_documents');
                    // Set permissions to 0777
                    File::chmod(storage_path('app/public/document_uploaded/approved_documents'), 0777);
                } else {
                    // If the directory exists, update permissions to 0777
                    File::chmod(storage_path('app/public/document_uploaded/approved_documents'), 0777);
                }

                $storedFilePath = $file->store($directory);

                if ($storedFilePath) {
                    $getapprovedproperty = Property::where(['landlord_id' => $landlord_id, 'id' => $property_id, 'status' => 1, 'is_deleted' => 0, 'screening_status' => 4])->first();
                    if (!empty($getapprovedproperty)) {
                        $getapprovedproperty->uploaded_report = $storedFilePath;
                        if ($getapprovedproperty->save()) {
                            $response = [
                                "status" => 1,
                                "message" => "You have successfully Upload Report",
                                "data" => $storedFilePath,
                            ];
                            return response()->json($response, 200);

                        }

                    } else {
                        $response = [
                            "status" => 0,
                            "message" => "Sorry Invalid Property or property feleted By landlord",
                        ];
                        return response()->json($response, 200);

                    }
                } else {
                    $response = [
                        "status" => 0,
                        "message" => "Sorry Some technical issues are there while uploading, Please try later or contact admin",
                    ];
                    return response()->json($response, 200);

                }

            }

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            $response = [
                "status" => 0,
                "message" => $errorMessage,
            ];
            return response()->json($response, 500);
        }

    }
    /**********Admin **********/

    /**********Land Lord **********/
    public function myProperty(Request $request)
    {
        try {
            $data = [];
            if ($request->isMethod('post')) {

                $validator = Validator::make($request->all(), [
                    'address' => ['required', 'string', 'max:355'],
                    'apartment' => ['required', 'string', 'max:255'],
                    'amount' => ['required'],
                    'province' => ['required'],
                    'date_available' => ['required'],
                    'zipcode' => ['required'],

                    'agreement' => ['required', 'accepted'],
                    'file' => ['required', 'file', 'mimes:jpeg,jpg,png', 'max:5048'],

                ]);

                if ($validator->fails()) {
                    return redirect()->back()->withInput()->withErrors($validator);
                }

                $id = Auth::user()->id;
                $landlord = User::where('id', $id)->first();

                $file = $request->file('file');

                $filename = $file->getClientOriginalName();
                $tmppath = $file->getPathname();
                $filepath = $file->getRealPath();
                $size = $file->getSize();
                $mime = $file->getMimeType();

                $directory = 'public/document_uploaded/property/user_' . $id . '';

                if (!Storage::exists('public/document_uploaded/property/user_' . $id . '')) {
                    // If the directory does not exist, create it
                    Storage::makeDirectory('public/document_uploaded/property/user_' . $id . '');
                    // Set permissions to 0777
                    File::chmod(storage_path('app/public/document_uploaded/property/user_' . $id . ''), 0777);
                } else {
                    // If the directory exists, update permissions to 0777
                    File::chmod(storage_path('app/public/document_uploaded/property/user_' . $id . ''), 0777);
                }

                $storedFilePath = $file->store($directory);

                // Get the storage path to the stored file
                $storagePath = storage_path('app/' . $storedFilePath);

                $property_data = [
                    'landlord_id' => $landlord->id,
                    'street_address' => $request->address,
                    'apartment' => $request->apartment,
                    'amount' => $request->amount,
                    'province' => $request->province,
                    'date_available' => $request->date_available,
                    'zipcode' => $request->zipcode,
                    'property_images' => $storedFilePath,
                    'is_verified' => 0,
                    'status' => 1,
                    'created_at' => Carbon::now()->toDateString(),
                ];

                Property::create($property_data);

                return redirect()->back()->with('success', 'Property created successfully.');
            }
            $user = Auth::user();
            $documents = $user->documents->first();
            $data['document_verified'] = isset($documents->is_verified) ? $documents->is_verified : "";

            $getproperties = Property::where(['landlord_id' => $user->id, 'is_deleted' => 0])
                ->orderBy('created_at', 'desc')
                ->get();
            $getscreeningproperties = Property::where(['landlord_id' => $user->id, 'is_deleted' => 0])
                ->where('screening_status', '<>', '0')
                ->orderBy('created_at', 'desc')
                ->get();

            $data['base_url'] = env('APP_URL');

            $data['properties'] = $getproperties->isNotEmpty() ? $getproperties : [];
            $data['screening_properties'] = $getscreeningproperties->isNotEmpty() ? $getscreeningproperties : [];

            return View('landlord.properties')->with($data);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->withErrors($validator)->with('error', $errorMessage)->withInput();
        }

    }

    public function Pricing()
    {
        return View('landlord.pricing');
    }
    /**********Land Lord **********/

}
