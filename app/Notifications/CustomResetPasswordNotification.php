<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomResetPasswordNotification extends Notification
{
    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = url(route('password.reset', [
            'token' => $this->token,
            'email' => $notifiable->getEmailForPasswordReset(),
        ], false));
$expire = config('auth.passwords.' . config('auth.defaults.passwords') . '.expire');
        return (new MailMessage)
            ->subject('Reset Your Password - ' . config('app.name'))
            ->view('emails.custom_reset', [
                'url' => $url,
                'firstname' => $notifiable->firstname ?? 'User',
                'lastname' => $notifiable->lastname ?? 'User',
                 'expire' => $expire, 
            ]);
        }
}
