<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $raw_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $raw_password)
    {
        $this->user = $user;
        $this->raw_password = $raw_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.users.created');
    }
}
