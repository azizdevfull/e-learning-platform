@extends('layouts.student')

@section('content')
    <h2>Dashboard</h2>

    <h3>Yozilgan kurslar:</h3>
    <ul>
        @foreach(auth()->user()->courses as $course)
            <li>{{ $course->title }}</li>
        @endforeach
    </ul>
@endsection