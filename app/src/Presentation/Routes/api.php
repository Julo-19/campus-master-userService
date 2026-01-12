<?php

use Illuminate\Support\Facades\Route;
use App\src\Presentation\Controllers\AuthController;

// 🔹 Inscription étudiant
Route::post('/auth/register/student', [AuthController::class, 'register']);

// 🔹 Connexion étudiant
Route::post('/auth/login', [AuthController::class, 'login']);

// Récupérer l’utilisateur connecté, logout ...
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/auth/me', [AuthController::class, 'me']);
//     Route::post('/auth/logout', [AuthController::class, 'logout']);
// });
