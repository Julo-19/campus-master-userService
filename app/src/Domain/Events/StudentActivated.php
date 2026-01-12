<?php

namespace App\src\Domain\Events;

use App\src\Infrastructure\Persistence\User;

class StudentActivated
{
    public User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
