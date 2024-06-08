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

    public function landLordProperty()
    {
        return View('admin.properties.landlord');

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
            $getproperties = Property::where(['landlord_id' => $user->id, 'is_deleted' => 0])->get();
            $data['base_url'] = env('APP_URL');

            $data['properties'] = $getproperties->isNotEmpty() ? $getproperties : [];

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
