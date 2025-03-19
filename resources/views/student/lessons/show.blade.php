@extends('layouts.student')

@section('content')
    <h2>{{ $lesson->title }}</h2>
    <p>{{ $lesson->content }}</p>

    @if($lesson->video_url)
        <video controls width="600">
            <source src="{{ $lesson->video_url }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    @endif
@endsection