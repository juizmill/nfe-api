<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        $appName = config('app.name');
        return $this->subject('['.$appName.'] Senha restaurada')
        ->markdown('mail.reset.password', [
            'username' => $this->user->name,
            'url' => url('/')
        ]);
    }
}
