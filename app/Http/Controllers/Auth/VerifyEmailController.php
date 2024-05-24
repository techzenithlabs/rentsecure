<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Logging for debugging purposes
        Log::info('Verification attempt for user:', ['email' => $user->email]);

        if ($user->hasVerifiedEmail()) {
            Log::info('User already verified:', ['email' => $user->email]);
            return redirect()->route('login')->with('info', 'Your email address has already been verified.');
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
            Log::info('User successfully verified:', ['email' => $user->email]);
        }

        // Set the verification_token field to null
        $user->update(['verification_token' => null, 'email_verified_at' => now()]);

        Log::info('User verification token updated to null:', ['email' => $user->email]);

        return redirect()->route('login')->with('verification_status', 'Your email address has been successfully verified. You can now log in.');
    }
}
