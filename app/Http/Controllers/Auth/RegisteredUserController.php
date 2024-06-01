<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

// Assuming you have a Mailable class for verification emails

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $countries = getCountryList();
        return view('auth.register')->with('countries', $countries);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        try {
            $data = [];

            $validator = Validator::make($request->all(), [
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'phone' => ['required'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', 'min:8', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
                'street_address' => ['required', 'string', 'max:355'],
                'country' => ['required'],
                'state' => ['required'],
                'city' => ['required'],
                'zipcode' => ['required'],
                'file' => ['required', 'file', 'mimes:pdf,docx,xlss,jpeg,png', 'max:2048'],

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            $roleName = $request->user_type == 'landlord' ? 'Landlord' : 'Tenant';

            $role = Role::select('id')->where('name', $roleName)->first();

            $file = $request->file('file');

            $filename = $file->getClientOriginalName();
            $tmppath = $file->getPathname();
            $filepath = $file->getRealPath();
            $size = $file->getSize();
            $mime = $file->getMimeType();

            $directory = 'public/document_uploaded';

            // Check if the directory exists
            if (!Storage::exists('public/document_uploaded')) {
                // If the directory does not exist, create it
                Storage::makeDirectory('public/document_uploaded');
                // Set permissions to 0777
                File::chmod(storage_path('app/public/document_uploaded'), 0777);
            } else {
                // If the directory exists, update permissions to 0777
                File::chmod(storage_path('app/public/document_uploaded'), 0777);
            }

            // Get the storage path to the directory

            $storedFilePath = $file->store($directory);

            // Get the storage path to the stored file
            $storagePath = storage_path('app/' . $storedFilePath);

            // Create verification token
            $verificationToken = \Str::random(60);

            $user = User::create([
                'firstname' => $request->firstname,
                'lastname' => $request->lastname,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'street_address' => $request->street_address,
                'country' => $request->country,
                'state' => $request->state,
                'city' => $request->city,
                'zipcode' => $request->zipcode,
                'role_id' => $role->id, // Assign the role_id
                'verification_token' => $verificationToken, // Save the verification token
                'status' => 0,
            ]);

            $userDocumentData = [
                'user_id' => $user->id,
                'document_type' => $mime,
                'documents' => $storedFilePath,
                'expiry_date' => $request->expiry_date ?? null,
                'is_verified' => 0,
            ];

            // Send verification email
            event(new Registered($user));

            // Create the associated document
            $user->documents()->create($userDocumentData);

            Auth::login($user);

            $role = Auth::guard('admin')->user();

            return redirect(route('dashboard', absolute: false));

        } catch (\Exception $e) {
            Log::info("Error " . $e->getMessage());

            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }

    }

    public function getStates(Request $request)
    {
        try {
            $country_id = $request->country_id;
            $getstates = getStatesByCountryId($country_id);
            if (!empty($getstates)) {
                $response = [
                    'status' => 1,
                    'message' => 'States Listed Successfully',
                    'data' => $getstates,
                ];
                return response()->json($response, 200);
            } else {
                $response = [
                    'status' => 0,
                    'message' => 'Sorry State not found',

                ];
                return response()->json($response, 200);
            }
            return $getstates;
        } catch (\Exception $e) {
            $response = [
                'status' => 0,
                'message' => $e->getMessage(),

            ];
            return response()->json([$response, 500]);
        }
    }
}
