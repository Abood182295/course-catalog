<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

// Home page simply sends visitors to the course list.
Route::get('/', function () {
    return redirect()->route('courses.index');
});

// List of all courses.
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Details of one course; {id} is passed to CourseController@show as $id.
Route::get('/courses/{id}', [CourseController::class, 'show'])
    ->whereNumber('id')
    ->name('courses.show');
