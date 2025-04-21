<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    /** @use HasFactory<\Database\Factories\GradeFactory> */
    use HasFactory;

    protected $fillable = ['grade', 'subject_id', 'student_id'];

    public const GRADES = [
        'Pass',
        'Merit',
        'Distinction',
        'Referral',
        'Fail',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function subject()
    {
        return $this->belongsTo(SubProgram::class, 'subject_id');
    }
}
