<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cms;
use App\Models\CmsBlocks;
use App\Models\User;
use App\Models\User_Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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
                $getslug = strpos($request->title, ' ') > -1 ? str_replace(' ', '-', $request->title) : $request->title;

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
                $getslug = strpos($request->title, ' ') > -1 ? str_replace(' ', '-', $request->title) : $request->title;
                $descripton = trim($request->description);
                $pages = Cms::findorfail($id);
                $pages->page_name = $getpage;
                $pages->slug = strtolower($getslug);
                $pages->description = $descripton;

                if ($pages->save()) {

                    return redirect()->route('cms')->with('success', 'Page updated successfully!');
                }

            }
            $page = Cms::with('blocks')->find($id);

            $data['pages'] = !empty($page) ? $page : [];
            return View('admin.cms.edit')->with($data);

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

    public function saveCmsBlocks(Request $request)
    {
        try {
            $data = [];

            if ($request->isMethod('post')) {

                $getpage = $request->pagename;
                switch ($getpage) {
                    case 'about-us':

                        $getfilePath = "";

                        if ($request->hasFile('home_story')) {
                            $file = $request->file('home_story');
                            $fileName = time() . '_' . $file->getClientOriginalName();
                            $directory = 'public/assets/images/pages/aboutus';
                            $filePath = $directory . '/' . $fileName;

                            if (!Storage::exists($directory)) {
                                Storage::makeDirectory($directory, 0775, true); // Create directory recursively
                            } else {
                                // Directory exists, update permissions if needed
                                //  Storage::chmod($directory, 0775, true); // Ensure permissions are set correctly
                            }

                            $getfilePath = $file->storeAs($directory, $fileName);
                        }

                        $updateOrCreate = CmsBlocks::updateOrCreate(
                            ['cms_id' => $request->id], // Condition to check if block exists
                            [
                                'home_story' => !empty($getfilePath) ? trim($getfilePath) : "",
                                'our_mission' => !empty($request->our_mission) ? trim($request->our_mission) : "",
                                // Add other fields similarly
                            ]
                        );

                        if ($updateOrCreate) {
                            $res = [
                                "status" => 1,
                                "message" => "Updated Successfully",
                            ];

                            return response()->json($res, 200);
                        }
                        break;
                    case 'blog':

                        $titles = $request->input('title');
                        $descriptions = $request->input('blogdesc');
                        $files = !empty($request->file('blogimg')) ? $request->file('blogimg') : [];

                        $filePaths = [];
                        if (!empty($files)) {
                            foreach ($files as $key => $file) {
                                if ($file) {
                                    $fileName = time() . '_' . $file->getClientOriginalName();
                                    $directory = 'public/assets/images/pages/blog';
                                    $filePath = $file->storeAs($directory, $fileName);
                                    $filePaths[] = $filePath;
                                } else {
                                    $filePaths[] = null;
                                }
                            }
                        }
                        $titlesJson = json_encode($titles);
                        $descriptionsJson = json_encode($descriptions);
                        $filePathsJson = !empty($filePaths) ? json_encode($filePaths) : json_encode([]);

                        // Update or create the database entry
                        $updateOrCreate = CmsBlocks::updateOrCreate(
                            ['cms_id' => $request->id], // Condition to check if block exists
                            [
                                'blog_title' => $titlesJson,
                                'blog_desc' => $descriptionsJson,
                                'blog_img' => $filePathsJson,
                                // Add other fields similarly
                            ]
                        );

                        if ($updateOrCreate) {
                            $res = [
                                "status" => 1,
                                "message" => "Updated Successfully",
                            ];

                            return response()->json($res, 200);
                        }
                        break;
                    case 'testimonial':
                        dd($request->id);
                        break;
                }
            }

        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();
            return redirect()->back()->with('error', $errorMessage)->withInput();
        }
    }

}
