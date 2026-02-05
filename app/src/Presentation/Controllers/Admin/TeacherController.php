<?php

namespace App\src\Presentation\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\src\Infrastructure\Persistence\User; 

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::query()
            ->where('role', 'teacher')
            ->where('status', 'active')
            ->select('id', 'name', 'email')
            ->get();

        return response()->json($teachers);
    }
}
