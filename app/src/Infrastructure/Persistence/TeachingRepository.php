<?php

namespace App\src\Infrastructure\Persistence;

use App\src\Domain\Entities\Teaching;
use App\src\Domain\Repositories\TeachingRepositoryInterface;

class TeachingRepository implements TeachingRepositoryInterface
{
    public function create(Teaching $teaching): Teaching
    {
        $model = TeachingModel::create([
            'title' => $teaching->title,
            'description' => $teaching->description,
            'teacher_id' => $teaching->teacherId,
            'status' => $teaching->status,
        ]);

        return new Teaching(
            $model->id,
            $model->title,
            $model->description,
            $model->teacher_id,
            $model->status
        );
    }
}
