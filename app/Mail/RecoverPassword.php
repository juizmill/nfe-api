<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RecoverPassword extends Mailable
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
        $url = url(sprintf('/recuperar-senha/%s', $this->user->token));

        return $this->subject('['.$appName.'] Recuperar senha')
            ->markdown('mail.recover.password', [
                'username' => $this->user->name,
                'url' => $url
            ]);
    }
}
