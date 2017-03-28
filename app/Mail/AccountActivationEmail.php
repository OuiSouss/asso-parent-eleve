<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivationEmail extends Mailable
{
    use Queueable, SerializesModels;

    private $user_count;
    private $token;

    /**
     * Create a new message instance.
     * @param $token
     */
    public function __construct($token)
    {
        $this->user_count = User::count();
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = ['user_count' => $this->user_count, 'token' => $this->token];

        return $this->from('noreply@apeg.fr', 'APEG - Activation de compte')
            ->subject(trans('user.email.account_activation.title'))
            ->view('emails/account_activation')
            ->with($data);
    }
}
