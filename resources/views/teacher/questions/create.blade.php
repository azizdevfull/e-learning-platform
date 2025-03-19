@extends('layouts.teacher')

@section('content')
    <h2>Yangi Savol Qo'shish</h2>

    <form action="{{ route('teacher.questions.store') }}" method="post" class="mt-3">
        @csrf

        <div class="mb-3">
            <label for="question_text" class="form-label">Savol matni:</label>
            <input type="text" name="question_text" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="test_id" class="form-label">Test tanlang:</label>
            <select name="test_id" class="form-select" required>
                @foreach($tests as $test)
                    <option value="{{ $test->id }}">
                        {{ $test->title }} - {{ $test->course->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Saqlash</button>
    </form>
@endsection