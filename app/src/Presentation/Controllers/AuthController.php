<?php
namespace App\src\Presentation\Controllers;

use App\Http\Controllers\Controller;
use App\src\Application\UseCases\RegisterStudent;
use App\src\Application\DTOs\RegisterStudentDTO;
use App\src\Presentation\Requests\RegisterStudentRequest;
use App\src\Application\UseCases\LoginStudent;
use App\src\Application\DTOs\LoginDTO;
use App\src\Presentation\Requests\LoginRequest;

class AuthController extends Controller
{
    public function register(RegisterStudentRequest $request, RegisterStudent $useCase)
    {
        $dto = new RegisterStudentDTO($request->validated());
        $useCase->execute($dto);

        return response()->json([
            'message' => 'Inscription réussie, en attente de validation'
        ], 201);
    }

    public function login(LoginRequest $request, LoginStudent $useCase)
    {
        $dto = new LoginDTO(
            $request->email,
            $request->password
        );

        return response()->json(
            $useCase->execute($dto)
        );
    }
}
