@extends('layouts.teacher')

@section('content')
    <div class="container">
        <h2>Course {{ $course->title }}</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <td>{{ $course->title }}</td>
        <td>{{ $course->category->name }}</td>
        <td>
            <a href="{{ route('teacher.courses.edit', $course->id) }}" class="btn btn-primary">Tahrirlash</a>
            <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger"
                    onclick="return confirm('O‘chirishga ishonchingiz komilmi?')">O‘chirish</button>
            </form>
        </td>
    </div>
@endsection