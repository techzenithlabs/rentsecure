<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;

class VerifyUserEmail extends VerifyEmailNotification
{
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);
        // log::info($notifiable);
        // // Log recipient's details
        // Log::info('Sending verification email to: ' . $notifiable->email);

        // // Log verification URL
        // Log::info('Verification URL: ' . $verificationUrl);

        return (new MailMessage)
            ->subject(Lang::get('Verify Email Address'))
            ->greeting(Lang::get('Hello! ') . $notifiable->firstname . ' ' . $notifiable->lastname)
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(Lang::get('Verify Email Address'), $verificationUrl)
            ->line(Lang::get('If you did not create an account, no further action is required.'))
            ->view('vendor.notifications.email', [
                'userName' => $notifiable->firstname . ' ' . $notifiable->lastname,
                'userEmail' => $notifiable->email,
                'greeting' => 'Hello ' . $notifiable->firstname . ' ' . $notifiable->lastname . '!',
                'level' => 'primary',
                'introLines' => ['Please click the button below to verify your email address.'],
                'actionText' => 'Verify Email Address',
                'actionUrl' => $verificationUrl,
                'outroLines' => ['If you did not create an account, no further action is required.'],
                'salutation' => 'Regards,<br>' . config('app.name'),
                'displayableActionUrl' => $verificationUrl,
            ]);
    }
}
