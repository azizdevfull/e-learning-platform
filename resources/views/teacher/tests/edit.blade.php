@extends('layouts.teacher')

@section('content')
    <h2>Testni tahrirlash</h2>
    <form action="{{ route('teacher.tests.update', $test) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Test nomi</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $test->title }}" required>
        </div>
        <div class="mb-3">
            <label for="course_id" class="form-label">Kurs tanlang</label>
            <select name="course_id" id="course_id" class="form-control" required>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}" {{ $course->id == $test->course_id ? 'selected' : '' }}>
                        {{ $course->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Yangilash</button>
    </form>
@endsection