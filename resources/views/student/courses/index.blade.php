@extends('layouts.student')

@section('content')
    <h2>Barcha kurslar</h2>

    @foreach($courses as $course)
        <div>
            <h3>{{ $course->title }}</h3>
            <p>{{ $course->description }}</p>

            <form action="{{ route('student.courses.enroll', $course->id) }}" method="POST">
                @csrf
                <button type="submit">Kursga yozilish</button>
            </form>
        </div>
    @endforeach
@endsection