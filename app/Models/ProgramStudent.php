<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudent extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramStudentFactory> */
    use HasFactory;

    protected $fillable = ['student_id', 'program_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function program()
    {
        return $this->belongsTo(Program::class, 'program_id');
    }
}
