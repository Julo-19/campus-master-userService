<?php
namespace App\src\Application\UseCases;

use App\src\Application\DTOs\RegisterStudentDTO;
use App\src\Domain\Entities\User;
use App\src\Domain\Repositories\UserRepositoryInterface;
use App\src\Domain\Events\StudentRegistered;

class RegisterStudent
{
    public function __construct(private UserRepositoryInterface $userRepo) {}

    public function execute(RegisterStudentDTO $dto)
    {
        $user = new User(
            name: $dto->prenom . ' ' . $dto->nom,
            email: $dto->email,
            password: bcrypt($dto->password),
        );

        $studentProfileData = [
            'prenom' => $dto->prenom,
            'nom' => $dto->nom,
            'ine' => $dto->ine,
            'telephone' => $dto->telephone,
            'date_naissance' => $dto->date_naissance,
        ];

        $savedUser = $this->userRepo->save($user, $studentProfileData);

        event(new StudentRegistered($savedUser));

        return $savedUser;
    }
}
