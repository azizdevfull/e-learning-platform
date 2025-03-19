@extends('layouts.app')

@section('content')
    <h2>Kurslar</h2>
    @foreach($categories as $category)
        <h4>Kategory: {{ $category->name }}</h4>
        <ul>
            @foreach($category->courses as $course)
                <li>
                    <form action="{{ route('student.courses.enroll', $course->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-link">{{ $course->title }}</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endforeach
@endsection