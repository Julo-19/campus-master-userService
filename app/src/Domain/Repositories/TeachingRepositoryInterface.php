<?php

namespace App\src\Domain\Repositories;

use App\src\Domain\Entities\Teaching;

interface TeachingRepositoryInterface
{
    public function create(Teaching $teaching): Teaching;
}
