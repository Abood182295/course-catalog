@props(['course'])

{{-- Reusable course card. Usage: <x-course-card :course="$course" /> --}}
<div class="card">
    <h3>{{ $course->title }}</h3>

    <p>
        <span class="badge">{{ $course->level }}</span>
        {{-- @if: only featured courses get the extra badge --}}
        @if ($course->is_featured)
            <span class="badge featured">Featured</span>
        @endif
    </p>

    <p class="muted">{{ $course->description }}</p>

    <p>
        <strong>Instructor:</strong> {{ $course->instructor->name }}<br>
        <strong>Duration:</strong> {{ $course->duration_weeks }} weeks
    </p>

    <a class="btn" href="{{ route('courses.show', $course->id) }}">View details &rarr;</a>
</div>
