<?php

namespace App\src\Infrastructure\Persistence;

use App\src\Domain\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EloquentUserRepository implements UserRepositoryInterface
{
    /**
     * Sauvegarde un étudiant + son profil
     */
    public function save($user, array $profileData)
    {
        $u = User::create([
            'name'     => $user->name,
            'email'    => $user->email,
            'password' => $user->password, // déjà hashé dans le UseCase
            'role'     => $user->role,
            'status'   => $user->status,
        ]);

        StudentProfile::create([
            'user_id' => $u->id,
            ...$profileData,
        ]);

        return $u;
    }

    /**
     * Trouver un utilisateur par email
     */
    public function findByEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Mettre à jour le statut d’un utilisateur
     */
    public function updateStatus(int $userId, string $status)
    {
        $user = User::findOrFail($userId);
        $user->update(['status' => $status]);

        return $user;
    }

    /**
     * Créer un enseignant (admin → Filament)
     */
    public function createTeacher(array $data): User
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make(Str::random(12)), 
            'role'     => 'teacher',
            'status'   => 'active',
        ]);
    }
}