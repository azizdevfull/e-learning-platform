@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Kategoriyani tahrirlash</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teacher.categories.update', $category->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Kategoriya nomi</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Yangilash</button>
            <a href="{{ route('teacher.categories.index') }}" class="btn btn-secondary">Ortga</a>
        </form>
    </div>
@endsection