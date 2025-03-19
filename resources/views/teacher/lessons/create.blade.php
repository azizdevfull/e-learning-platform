@extends('layouts.app')

@section('content')
    <h2>{{ $course->title }} - Yangi dars</h2>

    <form action="{{ route('teacher.courses.lessons.store', $course->id) }}" method="post">
        @csrf
        <input type="text" name="title" placeholder="Dars nomi" required>
        <textarea name="content" placeholder="Dars mazmuni" required></textarea>
        <input type="url" name="video_url" placeholder="Video URL (ixtiyoriy)">
        <button type="submit">Saqlash</button>
    </form>


@endsection