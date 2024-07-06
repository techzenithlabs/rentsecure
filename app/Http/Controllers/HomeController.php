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

        $view = "";

        if (!empty($page->slug)) {
            $view = match ($page->slug) {
                'about-us' => view('pages.about-us', ['page' => $page]),
                'blog' => view('pages.blog', ['page' => $page]),
                'blog' => view('pages.blog', ['page' => $page]),
            };
        }

        // Pass the page data to the view
        return $view;
    }
}
