@extends('layouts.student')

@section('content')
    <h2>{{ $test->title }} - Test</h2>

    <form action="{{ route('student.tests.submit', $test->id) }}" method="POST">
        @csrf

        @foreach($questions as $question)
            <div class="question">
                <h4>{{ $question->question_text }}</h4>

                @foreach($question->answers as $answer)
                    <label>
                        <input type="radio" name="question_{{ $question->id }}" value="{{ $answer->id }}">
                        {{ $answer->answer_text }}
                    </label><br>
                @endforeach
            </div>
            <hr>
        @endforeach

        <button type="submit">Testni Topshirish</button>
    </form>
@endsection