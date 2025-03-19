@extends('layouts.teacher')

@section('content')
    <h2>{{ $course->title }} - Testlar</h2>
    <a href="{{ route('teacher.courses.tests.create', $course->id) }}" class="btn btn-primary mb-3">+ Yangi Test</a>

    <ul class="list-group">
        @foreach($tests as $test)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $test->title }}
                <div>
                    <a href="{{ route('teacher.courses.tests.edit', [$course->id, $test->id]) }}"
                        class="btn btn-warning btn-sm">Tahrirlash</a>
                    <form action="{{ route('teacher.courses.tests.destroy', [$course->id, $test->id]) }}" method="post"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection