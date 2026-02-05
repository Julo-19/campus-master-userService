<?php

namespace App\src\Domain\Entities;

class Teaching
{
    public function __construct(
        public ?int $id,
        public string $title,
        public ?string $description,
        public int $teacherId,
        public string $status
    ) {}
}
