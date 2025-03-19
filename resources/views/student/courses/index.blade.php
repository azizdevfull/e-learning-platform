@extends('layouts.student')

@section('content')
    <h2>Kurslar</h2>
    @foreach($categories as $category)
        <h4>Kategory: {{ $category->name }}</h4>
        <ul>
            @foreach($category->courses as $course)
                <li>
                    <a href="{{ route('student.courses.show', $course->id) }}">{{ $course->title }}</a>
                </li>
            @endforeach
        </ul>
    @endforeach
@endsection