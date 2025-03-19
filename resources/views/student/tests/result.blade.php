<!-- resources/views/student/tests/result.blade.php -->

@extends('layouts.student')

@section('content')
    <h2>{{ $test->title }} - Natijalar</h2>

    <p>Sizning ballingiz: <strong>{{ $score }}%</strong></p>

    <a href="{{ route('student.dashboard') }}">Dashboardga qaytish</a>
@endsection