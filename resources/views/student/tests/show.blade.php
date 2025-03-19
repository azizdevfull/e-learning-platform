@extends('layouts.student')

@section('content')
    <h2>{{ $test->title }} — Testni topshirish</h2>

    <form action="{{ route('student.tests.submit', $test->id) }}" method="POST">
        @csrf
        @foreach($questions as $question)
            <div>
                <strong>{{ $question->question_text }}</strong>
                @foreach($question->answers as $answer)
                    <div>
                        <input type="radio" name="answers[{{ $question->id }}]" value="{{ $answer->id }}" required>
                        {{ $answer->answer_text }}
                    </div>
                @endforeach
            </div>
            <hr>
        @endforeach
        <button type="submit">Testni topshirish</button>
    </form>
@endsection