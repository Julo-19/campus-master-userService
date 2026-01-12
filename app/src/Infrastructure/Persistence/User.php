<?php

namespace App\src\Infrastructure\Persistence;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'users_cm';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'status',
    ];

    public function studentProfile()
    {
        return $this->hasOne(StudentProfile::class);
    }
}
