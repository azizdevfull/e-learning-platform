@extends('layouts.student')

@section('content')
    <h2>Test Natijasi: {{ $test->title }}</h2>

    @if ($latestResult)
        <p>Oxirgi ball: {{ $latestResult->score }}%</p>
    @endif

    <p>Umumiy natija: {{ $score }}%</p>

    <a href="{{ route('student.dashboard') }}">Ortga qaytish</a>
@endsection