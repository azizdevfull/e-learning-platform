@extends('layouts.student')

@section('content')
    <h2>{{ $test->title }} — Natija</h2>
    <p>Testdan olgan ballingiz: <strong>{{ $score }}%</strong></p>

    @if($score >= 70)
        <p>Tabriklaymiz! Siz muvaffaqiyatli o'tdingiz! 🎉</p>
    @else
        <p>Afsuski, siz o'ta olmadingiz. Keyingi safar omad!</p>
    @endif

    <a href="{{ route('student.dashboard') }}">Bosh sahifaga qaytish</a>
@endsection