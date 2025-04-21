<?php

namespace App\Http\Controllers;

use App\Models\ProgramStudent;
use App\Http\Requests\StoreProgramStudentRequest;
use App\Http\Requests\UpdateProgramStudentRequest;
use App\Models\Program;
use App\Models\User;

class ProgramStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programStudents = ProgramStudent::with(['user', 'program'])->get();

        return view('admin.program_student.index', compact('programStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::role('student')->get();
        $programs = Program::all();

        return view('admin.program_student.create', compact('students', 'programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramStudentRequest $request)
    {
        ProgramStudent::create([
            'student_id' => $request->student_id,
            'program_id' => $request->program_id,
        ]);

        return redirect()->route('program_student.index')->with('success', 'Student added to Program successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProgramStudent $programStudent)
    {
        $students = User::role('student')->get();
        $programs = Program::all();

        return view('admin.program_student.edit', compact('programStudent', 'students', 'programs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramStudentRequest $request, ProgramStudent $programStudent)
    {
        $validated = $request->validated();

        $programStudent->update($validated);

        return redirect()->route('program_student.index')->with('success', 'Program Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProgramStudent $programStudent)
    {
        $programStudent->delete();

        return redirect()->route('program_student.index')->with('success', 'Student relating to the Program deleted successfully.');
    }
}
