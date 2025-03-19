@extends('layouts.teacher')

@section('title', 'O‘quvchi sahifasi')

@section('content')
    <div class="container mt-4">
        <h2>O‘qotuvchi sahifasi {{ Auth::user()->name }}</h2>
    </div>
@endsection