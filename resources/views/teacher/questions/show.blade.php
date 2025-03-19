@extends('layouts.teacher')

@section('content')
    <h2>Savol: {{ $question->question_text }}</h2>
    <p><strong>Test:</strong> {{ $question->test->title }}</p>
    <p><strong>Kurs:</strong> {{ $question->test->course->title }}</p>

    <h4>Javoblar:</h4>
    @if($question->answers->isEmpty())
        <p>Hozircha javoblar mavjud emas.</p>
    @else
        <ul class="list-group mb-3">
            @foreach($question->answers as $answer)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    {{ $answer->answer_text }}
                    <strong>{{ $answer->is_correct ? '✅ To‘g‘ri' : '❌ Noto‘g‘ri' }}</strong>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('teacher.questions.index') }}" class="btn btn-secondary">Ortga qaytish</a>
@endsection