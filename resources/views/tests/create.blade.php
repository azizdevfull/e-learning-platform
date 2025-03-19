@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Yangi test yaratish</h2>

        <form action="{{ route('courses.tests.store', $course->id) }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Test nomi:</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Test nomini kiriting" required>
            </div>

            <button type="submit" class="btn btn-primary">Test yaratish</button>
            <a href="{{ route('courses.tests.index', $course->id) }}" class="btn btn-secondary">Ortga qaytish</a>
        </form>
    </div>
@endsection
