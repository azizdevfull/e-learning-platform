@extends('layouts.app')

@section('content')
    <h2>{{ $course->title }} - Darslar</h2>
    <a href="{{ route('teacher.courses.lessons.create', $course->id) }}">+ Yangi dars</a>

    <ul>
        @foreach($lessons as $lesson)
            <li>{{ $lesson->title }}
                @if($lesson->video_url)
                    <a href="{{ $lesson->video_url }}" target="_blank">Video</a>
                @endif
                <a href="{{ route('teacher.courses.lessons.edit', [$course->id, $lesson->id]) }}">Tahrirlash</a>
                <form action="{{ route('teacher.courses.lessons.destroy', [$course->id, $lesson->id]) }}" method="post"
                    style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">O'chirish</button>
                </form>
            </li>
        @endforeach
    </ul>


@endsection