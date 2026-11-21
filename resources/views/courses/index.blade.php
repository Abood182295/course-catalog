@extends('layouts.app')

@section('title', 'All Courses')

@section('content')
    <h1>Courses</h1>

    <div class="grid">
        {{-- @foreach loops over the courses; @empty runs if there are none --}}
        @forelse ($courses as $course)
            <x-course-card :course="$course" />
        @empty
            <p>No courses available yet. Run <code>php artisan migrate --seed</code>.</p>
        @endforelse
    </div>
@endsection
