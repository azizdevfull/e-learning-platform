{{-- resources/views/teacher/statistics/index.blade.php --}}
@extends('layouts.teacher')

@section('content')
    <h2>Kurslar statistikasi</h2>
    <ul>
        @foreach($courses as $course)
            <li>
                <a href="{{ route('teacher.statistics.course.details', $course) }}">
                    {{ $course->title }} - Talabalar soni: {{ $course->students->count() }}
                </a>
            </li>
        @endforeach
    </ul>

    <h2>Testlar statistikasi</h2>
    <ul>
        @foreach($tests as $test)
            <li>
                <a href="{{ route('teacher.statistics.test.details', $test) }}">
                    {{ $test->title }} - Savollar soni: {{ $test->questions->count() }}
                </a>
            </li>
        @endforeach
    </ul>
@endsection