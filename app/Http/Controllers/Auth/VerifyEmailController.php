<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        Log::info('Verification attempt for user:', ['email' => $user->email]);

        if ($user->hasVerifiedEmail()) {
            Log::info('User already verified:', ['email' => $user->email]);
            return redirect()->route('login')->with('info', 'Your email address has already been verified.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            Log::info('User successfully verified:', ['email' => $user->email]);
        }

        $user->update(['verification_token' => null, 'email_verified_at' => now()]);

        Log::info('User verification token updated to null:', ['email' => $user->email]);

        Auth::logout();

        return redirect()->route('login')->with('info', 'You can successfully Login now, However your uploaded documents is been reviewed by admin and soon you will notified');

    }

    public function verified()
    {
        return view('auth.verification-verified');
    }
}
