@extends('layouts.teacher')

@section('content')
    <h2>{{ $course->title }} - Yangi dars</h2>

    <form action="{{ route('teacher.courses.lessons.store', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Dars nomi</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Dars matni</label>
            <textarea class="form-control" id="content" name="content" required></textarea>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Fayl yuklash (PDF, DOCX, MP4, JPG, PNG)</label>
            <input type="file" class="form-control" id="file" name="file">
        </div>

        <button type="submit" class="btn btn-success">Darsni saqlash</button>
    </form>



@endsection