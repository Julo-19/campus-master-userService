<?php

use Illuminate\Support\Facades\Route;
use App\src\Presentation\Controllers\AuthController;
use App\src\Presentation\Controllers\TeachingController;
use App\src\Presentation\Controllers\Admin\TeacherController;
use Illuminate\Http\Request;

// 🔹 Inscription étudiant
Route::post('/auth/register/student', [AuthController::class, 'register']);

// 🔹 Connexion étudiant
Route::post('/auth/login', [AuthController::class, 'login']);

Route::post('/teachers', [TeachingController::class, 'store']);

// 🔹 ADMIN – lister les profs (pour Filament du course-service)
Route::prefix('admin')->group(function () {
    Route::get('/teachers', [TeacherController::class, 'index']);   
});



Route::middleware('auth:sanctum')->get('/auth/me', function (Request $request) {
    return response()->json([
        'status' => 'success',
        'data' => $request->user()
    ]);
});

// Route::middleware('auth:sanctum')->get('/auth/verify-token', function (Request $request) {
//     return response()->json([
//         'status' => 'success',
//         'data' => [
//             'id' => $request->user()->id,
//             'name' => $request->user()->name,
//             'email' => $request->user()->email,
//             'role' => $request->user()->role ?? 'teacher',
//         ]
//     ]);
// });



// Route::middleware('auth:api')->get('/auth/verify-token', function (Request $request) {
//     return response()->json([
//         'status' => 'success',
//         'data' => $request->user()
//     ]);
// });



// Récupérer l’utilisateur connecté, logout ...
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/auth/me', [AuthController::class, 'me']);
//     Route::post('/auth/logout', [AuthController::class, 'logout']);
// });
