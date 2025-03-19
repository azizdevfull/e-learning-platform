<!-- resources/views/student/dashboard.blade.php -->

@extends('layouts.student')

@section('content')
    <h2>Dashboard</h2>

    <h3>Kurslaringiz:</h3>
    <ul>
        @foreach($enrolledCourses as $course)
            <li>{{ $course->title }}</li>
        @endforeach
    </ul>

    <h3>Mavjud Testlar:</h3>
    <ul>
        @foreach($tests as $test)
            <li>
                <a href="{{ route('student.tests.show', $test->id) }}">{{ $test->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection