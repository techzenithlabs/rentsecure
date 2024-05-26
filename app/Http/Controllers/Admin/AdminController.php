<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User_Document;
use Illuminate\Http\Request;
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

    public function adminAction(Request $request)
    {
        try {
            $userId = $request->input('userId');
            $action = $request->input('action');
            $status = ($action == 1) ? 1 : 0;

            $user = User::find($userId);
            $user->status = $status;
            if ($user->save()) {
                $data = [
                    "is_verified" => $action,
                ];
                $docUpdate = User_Document::where('user_id', $user->id)->update($data);
                $res = [
                    "status" => 1,
                    "message" => $action == 1 ? "You Verified Successfully" : "Sorry you Rejected",

                ];
                return response()->json($res, 200);
            }

        } catch (\Exception $e) {
            $res = [
                "status" => 0,
                "message" => $e->getMessage(),
            ];
            return response()->json($res, 500);
        }
    }
}
