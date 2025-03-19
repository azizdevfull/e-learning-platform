@extends('layouts.teacher')

@section('content')
    <h2>Savollar Ro‘yxati</h2>
    <a href="{{ route('teacher.questions.create') }}" class="btn btn-primary mb-3">+ Yangi Savol</a>

    <ul class="list-group">
        @foreach($questions as $question)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $question->question_text }}
                - <strong>{{ $question->test->title }}</strong>
                ({{ $question->test->course->title }})

                <div>
                    <a href="{{ route('teacher.questions.edit', $question->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                    <a href="{{ route('teacher.questions.show', $question->id) }}" class="btn btn-info btn-sm">Ko‘rish</a>

                    <form action="{{ route('teacher.questions.destroy', $question->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection