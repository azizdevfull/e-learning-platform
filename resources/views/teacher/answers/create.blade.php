@extends('layouts.teacher')

@section('content')
    <h2>Yangi Javob Qo'shish</h2>

    <form action="{{ route('teacher.answers.store') }}" method="post" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="answer_text" class="form-label">Javob matni:</label>
            <input type="text" name="answer_text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="is_correct" class="form-label">To‘g‘rimi?</label>
            <select name="is_correct" class="form-select">
                <option value="1">Ha</option>
                <option value="0">Yo‘q</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="question_id" class="form-label">Savol tanlang:</label>
            <select name="question_id" class="form-select">
                @foreach($questions as $question)
                    <option value="{{ $question->id }}">
                        {{ $question->question_text }} - {{ $question->test->course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Saqlash</button>
    </form>
@endsection