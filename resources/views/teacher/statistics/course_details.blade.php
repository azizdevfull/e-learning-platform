{{-- resources/views/teacher/statistics/course_details.blade.php --}}
@extends('layouts.teacher')

@section('content')
    <h2>{{ $course->title }} kursidagi talabalar</h2>
    <ul>
        @forelse($students as $student)
            <li>{{ $student->name }} ({{ $student->email }})</li>
        @empty
            <li>Bu kursda hali talaba yo‘q.</li>
        @endforelse
    </ul>
@endsection