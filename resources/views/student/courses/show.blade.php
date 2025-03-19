@extends('layouts.student')

@section('content')
    <h2>{{ $course->title }} Kursi</h2>
    <p>{{ $course->description }}</p>

    <h4>Darslar:</h4>
    <ul>
        @foreach($course->lessons as $lesson)
            <li>
                <a href="{{ route('student.lessons.show', [$course->id, $lesson->id]) }}">{{ $lesson->title }}</a>
            </li>
        @endforeach
    </ul>
@endsection