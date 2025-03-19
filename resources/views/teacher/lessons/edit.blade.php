@extends('layouts.teacher')

@section('content')
    <h2>Darsni tahrirlash: {{ $lesson->title }}</h2>

    <form action="{{ route('teacher.courses.lessons.update', [$course->id, $lesson->id]) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Dars nomi</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $lesson->title }}" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Dars matni</label>
            <textarea class="form-control" id="content" name="content" required>{{ $lesson->content }}</textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Fayl yuklash (PDF, DOCX, MP4, JPG, PNG)</label>
            <input type="file" class="form-control" id="file" name="file">
            @if($lesson->file_path)
                <p>Hozirgi fayl: <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank">Ko‘rish/Yuklab olish</a>
                </p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Yangilash</button>
    </form>
@endsection