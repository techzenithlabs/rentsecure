<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function homePage()
    {
        return View('home');
    }

    public function showPage($slug = false)
    {

        // Retrieve the page from the database using the slug
        $page = Cms::where('slug', $slug)->where('status', 1)->first();

        // If the page doesn't exist, show a 404 error
        if (!$page) {
            return response()->view('errors.404', [], 404);
        }

        // Pass the page data to the view
        return view('pages.show', ['page' => $page]);
    }
}
