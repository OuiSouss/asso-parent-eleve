<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Reminder extends Mailable
{
    use Queueable, SerializesModels;

    private $user_count;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_count = User::count();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = ['user_count' => $this->user_count];

        return $this->from('hello@app.com', 'Your Application')
            ->subject('Your Reminder!')
            ->view('emails/reminder')
            ->with($data);
    }
}
