@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Testlar</h2>
        @foreach($enrolledCourses as $enrollment)
            <h4>{{ $enrollment->course->title }}</h4>
            <ul class="list-group mb-4">
                @foreach($enrollment->course->tests as $test)
                    <li class="list-group-item">
                        <a href="{{ route('student.tests.show', $test->id) }}">{{ $test->title }}</a>
                    </li>
                @endforeach
            </ul>
        @endforeach
    </div>
@endsection