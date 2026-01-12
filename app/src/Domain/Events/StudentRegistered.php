<?php

namespace App\src\Domain\Events;

use App\src\Infrastructure\Persistence\User;

class StudentRegistered
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
