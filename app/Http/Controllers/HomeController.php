<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Models\Program;
use App\Models\SubProgram;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUsMail;

class HomeController extends Controller
{
    /**
     * Display the homepage with a selection of sub-programs.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $subPrograms = SubProgram::take(6)->get();
        return view('home', compact('subPrograms'));
    }

    /**
     * Display a list of all courses.
     *
     * @return \Illuminate\View\View
     */
    public function courses()
    {
        $courses = SubProgram::all();
        return view('courses', compact('courses'));
    }

    /**
     * Display a list of all programs.
     *
     * @return \Illuminate\View\View
     */
    public function program()
    {
        $programs = Program::all();
        return view('program', compact('programs'));
    }

    /**
     * Display details of a specific course.
     *
     * @param \App\Models\SubProgram $course
     * @return \Illuminate\View\View
     */
    public function showCourse(SubProgram $course)
    {
        return view('course', compact('course'));
    }

    /**
     * Display details of a specific program along with its sub-programs.
     *
     * @param \App\Models\Program $program
     * @return \Illuminate\View\View
     */
    public function showProgram(Program $program)
    {
        $program->load('subPrograms');
        return view('program-course', compact('program'));
    }

    /**
     * Display the authenticated user's grades along with their subjects.
     *
     * @return \Illuminate\View\View
     */
    public function showGrades()
    {
        $user = auth()->user();
        $grades = $user->grades()->with('subject')->get();

        return view('student.my-grades', compact('grades'));
    }

    /**
     * Display the authenticated user's programs and their associated sub-programs.
     *
     * @return \Illuminate\View\View
     */
    public function showCourses()
    {
        $user = auth()->user();

        $programs = $user->program()->with('subPrograms')->get();

        return view('student.my-courses', compact('programs'));
    }

    /**
     * Display the contact page with a list of all programs.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        $programs = Program::all();

        return view('contact', compact('programs'));
    }

    /**
     * Handle the submission of the contact form and send an email to support.
     *
     * @param \App\Http\Requests\ContactFormRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function submit(ContactFormRequest $request)
    {
        $user = auth()->user();
        $userEmail = $user->email;
        $name = $user->name;

        $messageContent = $request->input('message');
        $programId = $request->input('program');

        $program = Program::find($programId);
        $programTitle = $program ? $program->title : 'N/A';

        Mail::to('support@colorlib.com')->send(new ContactUsMail(
            messageContent: $messageContent,
            name: $name,
            email: $userEmail,
            program: $programTitle
        ));

        return redirect()->back()->with('success', 'Your message has been sent!');
    }
}
