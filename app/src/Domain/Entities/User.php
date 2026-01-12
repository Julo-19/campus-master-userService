<?php

namespace App\src\Domain\Entities;

class User {
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role = 'student',
        public string $status = 'pending'
    ) {}
}
