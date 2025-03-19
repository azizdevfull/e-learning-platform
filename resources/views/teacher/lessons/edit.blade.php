@extends('layouts.app')

@section('content')
    <h2>Darsni tahrirlash</h2>

    <form action="{{ route('teacher.courses.lessons.update', [$lesson->course_id, $lesson->id]) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="title" value="{{ $lesson->title }}" required>
        <textarea name="content" required>{{ $lesson->content }}</textarea>
        <input type="url" name="video_url" value="{{ $lesson->video_url }}" placeholder="Video URL (ixtiyoriy)">
        <button type="submit">Yangilash</button>
    </form>



@endsection