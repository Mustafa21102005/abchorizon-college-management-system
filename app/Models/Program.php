<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    /** @use HasFactory<\Database\Factories\ProgramFactory> */
    use HasFactory;

    protected $fillable = ['title'];

    public function subPrograms()
    {
        return $this->hasMany(SubProgram::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'program_students')->withTimestamps();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
