<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User_Document;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Check user status before allowing login
        $user = Auth::user();
        $user_doc = User_Document::select('is_verified')->where('user_id', $user->id)->first();
        // if ($user && $user->status == 0 && $user_doc->is_verified == 0) {
        //     Auth::logout();
        //     return Redirect::route('login')->with('info', 'Your profile is under review. You will be informed once it is verified or rejected.');
        // } elseif ($user && $user->status == 0 && $user_doc->is_verified == 2) {
        //     Auth::logout();
        //     return Redirect::route('login')->with('info', 'Your profile is been rejected. You can contact admin for more details.');
        // }

        // Redirect other users to their respective dashboards
        return redirect()->intended(route('dashboard', absolute: false))->with('success', 'You have successfully logged in.');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
