<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Show every course (with its instructor loaded in one extra query).
     */
    public function index(): View
    {
        $courses = Course::with('instructor')->orderBy('title')->get();

        return view('courses.index', ['courses' => $courses]);
    }

    /**
     * Show one course. $id comes from the /courses/{id} route parameter.
     * findOrFail() returns a 404 page if the id does not exist.
     */
    public function show(int $id): View
    {
        $course = Course::with('instructor')->findOrFail($id);

        return view('courses.show', ['course' => $course]);
    }
}
