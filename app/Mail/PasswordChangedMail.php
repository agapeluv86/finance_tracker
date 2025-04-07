<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordChangedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->from('no-reply@example.com')
                    ->subject('Your Password Has Been Changed')
                    ->view('emails.password-changed')
                    ->with([
                        'firstname' => $this->user->firstname,
                        'lastname' => $this->user->lastname,
                        'email' => $this->user->email,
                    ]);
    }
}
