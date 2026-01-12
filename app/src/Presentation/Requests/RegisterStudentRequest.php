<?php
namespace App\src\Presentation\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStudentRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            // 'name' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|unique:users_cm,email',
            'password' => 'required|string|min:8|confirmed',
            'ine' => 'required|string|unique:student_profiles,ine',
            'telephone' => 'nullable|string|max:20',
            'date_naissance' => 'nullable|date',
        ];
    }
}
