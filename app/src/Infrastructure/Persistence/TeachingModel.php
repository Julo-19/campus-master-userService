<?php

namespace App\src\Infrastructure\Persistence;

use Illuminate\Database\Eloquent\Model;

class TeachingModel extends Model
{
    protected $table = 'teachers';

    protected $fillable = [
        'title',
        'description',
        'teacher_id',
        'status',
    ];

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
        return $this->belongsTo(\App\src\Infrastructure\Persistence\User::class, 'teacher_id');
    }
}


