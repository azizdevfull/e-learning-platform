@extends('layouts.teacher')

@section('content')
    <div class="container">
        <h2>Course'ni tahrirlash</h2>

        <form action="{{ route('teacher.courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Course nomi</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $course->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Tavsif</label>
                <textarea class="form-control" id="description" name="description"
                    required>{{ $course->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route('teacher.courses.index') }}" class="btn btn-secondary">Ortga</a>
        </form>
    </div>
@endsection