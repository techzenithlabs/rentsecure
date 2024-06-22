<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\User;
use App\Models\User_Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
            $errorMessage = $e->getMessage();
            return redirect()->back()->withErrors($validator)->with('error', $errorMessage)->withInput();
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

    public function adminCMS(Request $request)
    {
        try {
            $data = [];
            if ($request->isMethod('post')) {
                $getslug = strpos($request->title, ' ') > -1 ? str_replace(' ', '_', $request->title) : $request->title;

                $data = [
                    "page_name" => $request->title,
                    "slug" => trim(strtolower($getslug)),
                    "description" => trim($request->description),
                ];

                $addata = Cms::create($data);
                if ($addata) {
                    return redirect()->route('cms')->with('success', 'Page added successfully!');
                }

            }
            $page = CMS::where('status', 1)->get();
            $data['pages'] = $page->isNotEmpty() ? $page : [];

            return View('admin.cms.index')->with($data);
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

    public function addCMS()
    {
        return View('admin.cms.add');
    }

    public function editCMS(Request $request, $id = null)
    {
        try {
            $data = [];

            if ($request->isMethod('post')) {
                $id = $request->id;
                $getpage = trim($request->title);
                $getslug = strpos($request->title, ' ') > -1 ? str_replace(' ', '_', $request->title) : $request->title;
                $descripton = trim($request->description);
                $pages = Cms::findorfail($id);
                $pages->page_name = $getpage;
                $pages->slug = strtolower($getslug);
                $pages->description = $descripton;
                if ($pages->save()) {
                    return redirect()->route('cms')->with('success', 'Page updated successfully!');
                }

            }
            $page = Cms::find($id);
            $data['pages'] = !empty($page) ? $page : [];
            return View('admin.cms.edit')->with($data);

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

}
