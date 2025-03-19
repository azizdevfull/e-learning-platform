@extends('layouts.teacher')

@section('content')
    <h2>Testni tahrirlash</h2>

    <form action="{{ route('teacher.courses.tests.update', [$test->course_id, $test->id]) }}" method="post" class="mt-3">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <input type="text" name="title" class="form-control" value="{{ $test->title }}" required>
        </div>
        <button type="submit" class="btn btn-success">Yangilash</button>
    </form>
@endsection