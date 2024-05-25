<?php

namespace App\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailNotification;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

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

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }
}
