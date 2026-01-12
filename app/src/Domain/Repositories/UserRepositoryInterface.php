<?php

namespace App\src\Domain\Repositories;

interface UserRepositoryInterface {
    public function save($user, array $studentProfile);
    public function findByEmail(string $email);
    public function updateStatus(int $userId, string $status);
}
