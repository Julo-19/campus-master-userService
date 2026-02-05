<?php

namespace App\src\Presentation\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\src\Application\UseCases\CreateTeaching;

class TeachingController extends Controller
{
    public function store(Request $request, CreateTeaching $useCase)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
            'teacher_id' => 'required|exists:users_cm,id',
        ]);

        $teaching = $useCase->execute(
            $request->title,
            $request->description,
            $request->teacher_id
        );

        return response()->json($teaching, 201);
    }
}

