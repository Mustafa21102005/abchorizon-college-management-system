<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Http\Requests\StoreProgramRequest;
use App\Http\Requests\UpdateProgramRequest;

class ProgramController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $programs = Program::all();
        return view('admin.programs.index', compact('programs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProgramRequest $request)
    {
        $validatedData = $request->validated();

        // Create the Program first (without the image)
        $program = Program::create($validatedData);

        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            // Store the image in the public storage
            $imagePath = $request->file('image')->store('program_images', 'public');

            // Create the Image record and associate it with the Program
            $program->image()->create([
                'path' => $imagePath,
            ]);
        }

        return redirect()->route('programs.index')->with('success', 'Program created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $program->load('subPrograms');
        return view('admin.programs.show', compact('program'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProgramRequest $request, Program $program)
    {
        // Handle image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Store the new image in the public storage
            $imagePath = $request->file('image')->store('program_images', 'public');

            // Check if the program already has an associated image
            if ($program->image) {
                // Get the old image path from the database
                $oldImagePath = $program->image->path;

                // Check if the file exists and delete it
                $fullPath = storage_path('app/public/' . $oldImagePath);

                // Delete old image from storage if it exists
                if (file_exists($fullPath)) {
                    unlink($fullPath); // Delete the file manually
                }

                // Update the image path in the database with the new one
                $program->image->update(['path' => $imagePath]);
            } else {
                // If no image exists, create a new image record and associate it with the program
                $program->image()->create([
                    'path' => $imagePath,
                ]);
            }
        }

        // Update other program details (e.g., title, description, etc.)
        $program->update($request->validated());

        return redirect()->route('programs.index')->with('success', 'Program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        if ($program->subPrograms()->count() > 0) {
            return redirect()->route('programs.index')->with('error', 'This program has courses and cannot be deleted.');
        }

        // Delete the image associated with the program
        if ($program->image) {
            // Delete the image file from storage
            $imagePath = storage_path('app/public/' . $program->image->path); // Get the full path of the image
            if (file_exists($imagePath)) {
                unlink($imagePath); // Delete the image file
            }

            $program->image->delete();
        }

        $program->delete();

        return redirect()->route('programs.index')->with('success', 'Program deleted successfully.');
    }
}
