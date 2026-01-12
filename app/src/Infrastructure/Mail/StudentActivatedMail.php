<?php

namespace App\src\Infrastructure\Mail;

use Illuminate\Mail\Mailable;
use App\src\Infrastructure\Persistence\User;

class StudentActivatedMail extends Mailable
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Votre compte CampusMaster est activé')
                    ->view('emails.student_activated')
                    ->with([
                        'loginUrl' => config('app.frontend_url') . '/login',
                        'user' => $this->user
                    ]);
    }
}
