@extends('layouts.teacher')

@section('content')
    <h2>Savolni Tahrirlash</h2>

    <form action="{{ route('teacher.questions.update', $question->id) }}" method="post" class="mt-3">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="question_text" class="form-label">Savol matni:</label>
            <input type="text" name="question_text" class="form-control" value="{{ $question->question_text }}" required>
        </div>

        <div class="mb-3">
            <label for="test_id" class="form-label">Testni yangilang:</label>
            <select name="test_id" class="form-select" required>
                @foreach($tests as $test)
                    <option value="{{ $test->id }}" {{ $question->test_id == $test->id ? 'selected' : '' }}>
                        {{ $test->title }} - {{ $test->course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Yangilash</button>
    </form>
@endsection 