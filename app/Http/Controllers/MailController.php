<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail()
    {
        try {
            $mail = Mail::raw('This is a test email', function ($message) {
                $message->to('taklu@yopmail.com')
                    ->subject('Test Email');
            });

            // Log a success message indicating that the email was sent
            Log::info('Test email sent successfully');

        } catch (\Exception $e) {
            // Log an error message if there was an exception during email sending
            Log::error('Unable to send mail: ' . $e->getMessage());
            echo "unable to send mail " . $e->getMessage();
        }
    }
}
