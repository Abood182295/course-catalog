@extends('layouts.app')

@section('title', $course->title)

@section('content')
    <p><a href="{{ route('courses.index') }}">&larr; Back to all courses</a></p>

    <div class="card">
        <h1>{{ $course->title }}</h1>

        <p>
            <span class="badge">{{ $course->level }}</span>
            @if ($course->is_featured)
                <span class="badge featured">Featured</span>
            @endif
        </p>

        <p>{{ $course->description }}</p>
        <p><strong>Duration:</strong> {{ $course->duration_weeks }} weeks</p>

        <hr>

        <h3>Instructor</h3>
        <p><strong>{{ $course->instructor->name }}</strong></p>
        @if ($course->instructor->bio)
            <p class="muted">{{ $course->instructor->bio }}</p>
        @endif

        <h4>Other courses by {{ $course->instructor->name }}</h4>
        <ul>
            @foreach ($course->instructor->courses as $other)
                @if ($other->id !== $course->id)
                    <li><a href="{{ route('courses.show', $other->id) }}">{{ $other->title }}</a></li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection
