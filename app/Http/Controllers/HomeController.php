<?php

namespace App\Http\Controllers;

use App\Models\Cms;
use App\Models\Post;
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
        $page = Cms::with('blocks')->where('slug', $slug)->where('status', 1)->first();

        $blogs = Post::all();

        // If the page doesn't exist, show a 404 error
        if (!$page) {
            return response()->view('errors.404', [], 404);
        }

        $view = "";

        if (!empty($page->slug)) {
            $view = match ($page->slug) {
                'about-us' => view('pages.about-us', ['page' => $page]),
                'services' => view('pages.services', ['page' => $page]),
                'blog' => view('pages.blog', ['page' => $blogs]),
                'pricing' => view('pages.pricing', ['page' => $pages]),
                'contact-us' => view('pages.contact-us', ['page' => $page]),
                'testimonial' => view('pages.testimonial', ['page' => $page]),
                default => abort(404),
            };
        }

        // Pass the page data to the view
        return $view;
    }
}
