@extends('layouts.teacher')

@section('content')
    <h2>Yangi Test Yaratish</h2>
    <form action="{{ route('teacher.tests.store') }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Test nomi</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Kurs tanlang</label>
            <select name="course_id" id="course_id" class="form-control " required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Saqlash</button>
    </form>
@endsection