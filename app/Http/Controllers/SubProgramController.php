<?php

namespace App\Http\Controllers;

use App\Models\SubProgram;
use App\Http\Requests\StoreSubProgramRequest;
use App\Http\Requests\UpdateSubProgramRequest;
use App\Models\Program;

class SubProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subPrograms = SubProgram::all();
        return view('admin.sub_programs.index', compact('subPrograms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $programs = Program::all();

        return view('admin.sub_programs.create', compact('programs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubProgramRequest $request)
    {
        $data = $request->validated();

        // Automatically generate some fields
        $data['code'] = 'SP-' . strtoupper(uniqid());
        $data['created_by'] = auth()->id();

        SubProgram::create($data);

        return redirect()->route('sub_programs.index')->with('success', 'Sub Program created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubProgram $subProgram)
    {
        return view('admin.sub_programs.show', compact('subProgram'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubProgram $subProgram)
    {
        $programs = Program::all();

        $languages = SubProgram::select('language')->distinct()->pluck('language');

        return view('admin.sub_programs.edit', compact('programs', 'languages', 'subProgram'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubProgramRequest $request, SubProgram $subProgram)
    {
        $subProgram->update($request->validated());

        return redirect()->route('sub_programs.index')->with('success', 'Sub Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubProgram $subProgram)
    {
        $subProgram->delete();

        return redirect()->route('sub_programs.index')->with('success', 'Sub-program deleted successfully.');
    }
}
