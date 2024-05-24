<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /**
     * Verify the user's email address.
     */
    public function verify(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
        }

        return redirect()->route('login')->with('success', 'Your email has been verified. You can now log in.');
    }
}
