@extends('layouts.app')

@section('title', 'O‘quvchi sahifasi')

@section('content')
    <div class="container mt-4">
        <h2>O‘quvchi sahifasi</h2>
        <p>Bu yerda siz yozilgan kurslaringiz va testlarni ko‘rishingiz mumkin.</p>
        <!-- Logout tugmasi -->
        <form action="{{ route('student.logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
        @if($courses->isEmpty())
            <p>Hozircha kurslar mavjud emas.</p>
        @else
            <h4 class="mt-4">Mavjud kurslar:</h4>
            <ul class="list-group">
                @foreach($courses as $course)
                    <li class="list-group-item">
                        <strong>{{ $course->name }}</strong> - {{ $course->description }}

                        @if($course->tests->isNotEmpty())
                            <ul class="mt-2">
                                @foreach($course->tests as $test)
                                    <li>
                                        {{ $test->title }}
                                        <a href="{{ route('courses.tests.show', [$course->id, $test->id]) }}"
                                            class="btn btn-info btn-sm">Testni yechish</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-muted">Hozircha testlar mavjud emas.</p>
                        @endif
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection