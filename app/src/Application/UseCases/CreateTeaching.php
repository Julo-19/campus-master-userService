<?php


namespace App\src\Application\UseCases;

use App\src\Domain\Entities\Teaching;
use App\src\Domain\Repositories\TeachingRepositoryInterface;

class CreateTeaching
{
    public function __construct(
        private TeachingRepositoryInterface $repository
    ) {}

    public function execute(
        string $title,
        ?string $description,
        int $teacherId
    ): Teaching {
        $teaching = new Teaching(
            null,
            $title,
            $description,
            $teacherId,
            'inactive'
        );

        return $this->repository->create($teaching);
    }
}


