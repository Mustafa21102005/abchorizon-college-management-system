<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\User;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::with(['student', 'subject'])->get();
        return view('teacher.grades.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = User::role('student')->get();

        // $grades = Grade::select('grade')->distinct()->pluck('grade');

        $grades = Grade::GRADES;

        return view('teacher.grades.create', compact('students', 'grades'));
    }

    /**
     * Get the subjects for a specific student.
     */
    public function getSubjects(User $user)
    {
        $subjects = $user->program()->with('subPrograms')->get()->pluck('subPrograms')->flatten();

        return response()->json($subjects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGradeRequest $request)
    {
        $validated = $request->validated();

        // Create the grade record
        Grade::create([
            'student_id' => $validated['student_id'],
            'subject_id' => $validated['subject_id'],
            'grade' => $validated['grade'],
        ]);

        // Redirect back with success message
        return redirect()->route('grades.index')->with('success', 'Grade added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        $students = User::role('student')->get(); // Get all students

        // $grades = Grade::select('grade')->distinct()->pluck('grade');

        $grades = Grade::GRADES;

        // Fetch the student associated with the grade
        $student = $grade->student;

        // Fetch the sub-programs for the programs the student is enrolled in
        $subPrograms = $student->program()->with('subPrograms')->get()->pluck('subPrograms')->flatten();

        return view('teacher.grades.edit', compact('grade', 'students', 'subPrograms', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        // Validate the data (validated data is already handled by the form request)
        $validatedData = $request->validated();

        // Update the grade
        $grade->update([
            'student_id' => $validatedData['student_id'],
            'subject_id' => $validatedData['subject_id'],
            'grade' => $validatedData['grade'],
        ]);

        // Redirect with a success message
        return redirect()->route('grades.index')->with('success', 'Grade updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Grade deleted successfully.');
    }
}
