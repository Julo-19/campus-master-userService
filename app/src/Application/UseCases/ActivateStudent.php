<?php

namespace App\src\Application\UseCases;

use App\src\Domain\Repositories\UserRepositoryInterface;
use App\src\Domain\Events\StudentActivated;

class ActivateStudent
{
    public function __construct(private UserRepositoryInterface $userRepo) {}

    public function execute(int $userId)
    {
        $user = $this->userRepo->updateStatus($userId, 'active');

        event(new StudentActivated($user));

        return $user;
    }
}
