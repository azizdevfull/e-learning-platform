@extends('layouts.teacher')

@section('content')
    <h2>Test tafsilotlari</h2>
    <p><strong>Test nomi:</strong> {{ $test->title }}</p>
    <p><strong>Kurs:</strong> {{ $test->course->name }}</p>
    <a href="{{ route('teacher.tests.index') }}" class="btn btn-secondary">Orqaga</a>
@endsection