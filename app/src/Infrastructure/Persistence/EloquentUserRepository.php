<?php

namespace App\src\Infrastructure\Persistence;

use App\src\Domain\Repositories\UserRepositoryInterface;
use App\src\Infrastructure\Persistence\User;
use App\src\Infrastructure\Persistence\StudentProfile;


class EloquentUserRepository implements UserRepositoryInterface
{
    public function save($user, array $profileData)
    {
        $u = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'role' => $user->role,
            'status' => $user->status
        ]);

        StudentProfile::create(array_merge($profileData, ['user_id' => $u->id]));

        return $u;
    }

    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function updateStatus(int $userId, string $status)
    {
        $user = User::findOrFail($userId);
        $user->status = $status;
        $user->save();
        return $user;
    }
}
