<?php

namespace App\src\Application\Dtos;

class CreateTeacherDTO
{
    public function __construct(
        public string $name,
        public string $email,
    ) {}
}