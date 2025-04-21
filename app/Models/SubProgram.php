<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProgram extends Model
{
    /** @use HasFactory<\Database\Factories\SubProgramFactory> */
    use HasFactory;

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    protected $fillable = ['code', 'title', 'level', 'language', 'price', 'program_id'];

    public function grades()
    {
        return $this->hasMany(Grade::class, 'subject_id');
    }
}
