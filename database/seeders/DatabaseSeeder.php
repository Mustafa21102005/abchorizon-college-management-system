<?php

namespace Database\Seeders;

use App\Models\Grade;
use App\Models\Image;
use App\Models\Program;
use App\Models\ProgramStudent;
use App\Models\SubProgram;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create roles: student, teacher, and admin
        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $teacherRole = Role::firstOrCreate(['name' => 'teacher']);
        $adminRole = Role::firstOrCreate(['name' => 'admin']);

        // Create 10 students and assign the 'student' role
        $students = User::factory(10)->create()->each(function ($user) use ($studentRole) {
            $user->assignRole($studentRole);
        });

        // Create one teacher and assign the 'teacher' role
        $teacher = User::factory()->create();
        $teacher->assignRole($teacherRole);

        // Create one admin and assign the 'admin' role
        $admin = User::factory()->create();
        $admin->assignRole($adminRole);

        // Create 5 programs and 10 sub-programs
        $programs = Program::factory(5)->create();
        $subPrograms = SubProgram::factory(10)->create();

        // Associate an image with each program
        $programs->each(function ($program) {
            Image::factory()->create([
                'imageable_id' => $program->id,
                'imageable_type' => Program::class,
            ]);
        });

        // Fetch students and programs
        $students = User::role('student')->get();

        if ($students->isEmpty() || $programs->isEmpty()) {
            $this->command->warn('No students or programs found. Please seed the database with the required data.');
            return;
        }

        // Assign each student to one random program using the ProgramStudent factory
        $students->each(function ($student) use ($programs) {
            $program = $programs->random(); // Get a random program for the student
            ProgramStudent::factory()->create([
                'student_id' => $student->id,
                'program_id' => $program->id,
            ]);

            // Get the sub-programs associated with this program
            $subProgramsForProgram = $program->subPrograms;

            // If there are sub-programs, assign grades based on those sub-programs
            if ($subProgramsForProgram->isNotEmpty()) {
                Grade::factory(2)->make()->each(function ($grade) use ($student, $subProgramsForProgram) {
                    $subProgram = $subProgramsForProgram->random(); // Get a random sub-program from the student's program

                    // Check if grade already exists for the student and sub-program
                    if (!Grade::where('student_id', $student->id)
                        ->where('subject_id', $subProgram->id)
                        ->exists()) {
                        // Only insert if no duplicate exists
                        $grade->student_id = $student->id;
                        $grade->subject_id = $subProgram->id;
                        $grade->save();
                    }
                });
            }
        });

        $this->command->info('Database seeding completed successfully!');
    }
}
