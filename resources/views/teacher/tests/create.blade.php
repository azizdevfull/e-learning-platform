@extends('layouts.teacher')

@section('content')
    <h2>{{ $course->title }} - Yangi Test</h2>

    <form action="{{ route('teacher.courses.tests.store', $course->id) }}" method="post" class="mt-3">
        @csrf
        <div class="mb-3">
            <input type="text" name="title" class="form-control" placeholder="Test nomi" required>
        </div>
        <button type="submit" class="btn btn-success">Saqlash</button>
    </form>
@endsection