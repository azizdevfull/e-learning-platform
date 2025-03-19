@extends('layouts.teacher')

@section('content')
    <h2>Javoblar Ro‘yxati</h2>
    <a href="{{ route('teacher.answers.create') }}" class="btn btn-primary mb-3">+ Yangi Javob</a>

    <ul class="list-group">
        @foreach($answers as $answer)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $answer->answer_text }} -
                <strong>{{ $answer->is_correct ? 'To‘g‘ri' : 'Noto‘g‘ri' }}</strong>
                ({{ $answer->question->question_text }})

                <div>
                    <a href="{{ route('teacher.answers.edit', $answer->id) }}" class="btn btn-warning btn-sm">Tahrirlash</a>

                    <form action="{{ route('teacher.answers.destroy', $answer->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">O'chirish</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endsection