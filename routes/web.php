<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramStudentController;
use App\Http\Controllers\SubProgramController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth', 'role:admin||teacher', 'verified')->group(function () {

    Route::middleware(['auth', 'role:admin', 'verified'])
        ->prefix('programs')
        ->group(function () {

            Route::get('/create', [ProgramController::class, 'create'])->name('programs.create');

            Route::post('/', [ProgramController::class, 'store'])->name('programs.store');

            Route::get('/{program}/edit', [ProgramController::class, 'edit'])->name('programs.edit');

            Route::put('/{program}', [ProgramController::class, 'update'])->name('programs.update');

            Route::delete('/{program}', [ProgramController::class, 'destroy'])->name('programs.destroy');
        });

    Route::get('/programs', [ProgramController::class, 'index'])->name('programs.index');

    Route::get('/programs/{program}', [ProgramController::class, 'show'])->name('programs.show');

    Route::middleware(['auth', 'role:admin', 'verified'])
        ->prefix('sub_programs')
        ->group(function () {

            Route::get('/create', [SubProgramController::class, 'create'])->name('sub_programs.create');

            Route::post('/', [SubProgramController::class, 'store'])->name('sub_programs.store');

            Route::get('/{sub_program}/edit', [SubProgramController::class, 'edit'])->name('sub_programs.edit');

            Route::put('/{sub_program}', [SubProgramController::class, 'update'])->name('sub_programs.update');

            Route::delete('/{sub_program}', [SubProgramController::class, 'destroy'])->name('sub_programs.destroy');
        });

    Route::get('/sub_programs', [SubProgramController::class, 'index'])->name('sub_programs.index');

    Route::get('/sub_programs/{sub_program}', [SubProgramController::class, 'show'])->name('sub_programs.show');

    Route::middleware(['auth', 'role:teacher', 'verified'])
        ->prefix('grades')
        ->group(function () {

            Route::get('/create', [GradeController::class, 'create'])->name('grades.create');

            Route::get('/{user}/subjects', [GradeController::class, 'getSubjects'])->name('grades.subjects');

            Route::post('/', [GradeController::class, 'store'])->name('grades.store');

            Route::get('/{grade}/edit', [GradeController::class, 'edit'])->name('grades.edit');

            Route::put('/{grade}', [GradeController::class, 'update'])->name('grades.update');

            Route::delete('/{grade}', [GradeController::class, 'destroy'])->name('grades.destroy');
        });

    Route::get('/grades', [GradeController::class, 'index'])->name('grades.index');

    Route::resource('users', UserController::class)->middleware(['role:admin']);

    Route::middleware(['auth', 'role:admin', 'verified'])
        ->prefix('program_student')
        ->group(function () {

            Route::get('/create', [ProgramStudentController::class, 'create'])->name('program_student.create');

            Route::post('/', [ProgramStudentController::class, 'store'])->name('program_student.store');

            Route::get('/{program_student}/edit', [ProgramStudentController::class, 'edit'])->name('program_student.edit');

            Route::put('/{program_student}', [ProgramStudentController::class, 'update'])->name('program_student.update');

            Route::delete('/{program_student}', [ProgramStudentController::class, 'destroy'])->name('program_student.destroy');
        });

    Route::get('/program_student', [ProgramStudentController::class, 'index'])->name('program_student.index');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/course', [HomeController::class, 'courses'])->name('courses');

Route::get('/courses/{course}', [HomeController::class, 'showCourse'])->name('course.show');

Route::get('/program', [HomeController::class, 'program'])->name('program');

Route::get('/program/{program}', [HomeController::class, 'showProgram'])->name('program.courses');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact')->middleware('auth', 'verified');

Route::post('/contact', [HomeController::class, 'submit'])->name('contact.submit');

Route::prefix('student')->middleware(['auth', 'role:student', 'verified'])->group(function () {
    Route::get('/my-grades', [HomeController::class, 'showGrades'])->name('my-grades');

    Route::get('/my-courses', [HomeController::class, 'showCourses'])->name('my-courses');
});

// Make the roles admin and teacher
// Route::get('/setsettings', function () {
//     $role = Role::create(['name' => 'teacher']);
// });
