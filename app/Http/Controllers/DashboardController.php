<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\SubProgram;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $studentsCount = User::role('student')->count();
        $teachersCount = User::role('teacher')->count();
        $programsCount = Program::count();
        $subProgramsCount = SubProgram::count();

        return view('dashboard', compact('studentsCount', 'teachersCount', 'programsCount', 'subProgramsCount'));
    }
}
