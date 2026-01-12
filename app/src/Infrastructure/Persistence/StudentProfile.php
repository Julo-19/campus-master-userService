<?php

namespace App\src\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\src\Infrastructure\Persistence\User;

class StudentProfile extends Model
{
    use HasFactory;

    
    protected $table = 'student_profiles';

    protected $fillable = [
        'user_id',
        'prenom',
        'nom',
        'ine',
        'telephone',
        'date_naissance',
    ];

    /**
     * Relation avec l'utilisateur
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
