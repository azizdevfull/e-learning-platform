@extends('layouts.teacher')

@section('content')
    <h2>Javobni Tahrirlash</h2>

    <form action="{{ route('teacher.answers.update', $answer->id) }}" method="post" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="answer_text" class="form-label">Javob matni:</label>
            <input type="text" name="answer_text" class="form-control" value="{{ $answer->answer_text }}" required>
        </div>

        <div class="mb-3">
            <label for="is_correct" class="form-label">To‘g‘rimi?</label>
            <select name="is_correct" class="form-select">
                <option value="1" {{ $answer->is_correct ? 'selected' : '' }}>Ha</option>
                <option value="0" {{ !$answer->is_correct ? 'selected' : '' }}>Yo‘q</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="question_id" class="form-label">Savol tanlang:</label>
            <select name="question_id" class="form-select">
                @foreach($questions as $question)
                    <option value="{{ $question->id }}" {{ $question->id == $answer->question_id ? 'selected' : '' }}>
                        {{ $question->question_text }} - {{ $question->test->course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Yangilash</button>
    </form>
@endsection