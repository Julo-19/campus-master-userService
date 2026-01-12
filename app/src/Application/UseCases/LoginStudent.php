<?php

namespace App\src\Application\UseCases;

use App\src\Application\DTOs\LoginDTO;
use App\src\Domain\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginStudent
{
    public function __construct(
        private UserRepositoryInterface $userRepository
    ) {}

    public function execute(LoginDTO $dto): array
    {
        $user = $this->userRepository->findByEmail($dto->email);

        if (! $user || ! Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Identifiants invalides'],
            ]);
        }

        if ($user->status !== 'active') {
            throw ValidationException::withMessages([
                'status' => ['Compte non activé'],
            ]);
        }

        $token = $user->createToken('student-token')->plainTextToken;

        return [
            'token' => $token,
            'user' => [
                'id'    => $user->id,
                'name'  => $user->name,
                'email' => $user->email,
                'role'  => $user->role,
            ],
        ];
    }
}
