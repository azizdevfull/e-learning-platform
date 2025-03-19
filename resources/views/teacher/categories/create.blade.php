@extends('layouts.teacher')

@section('content')
    <div class="container">
        <h2>Yangi kategoriya qo‘shish</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('teacher.categories.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Kategoriya nomi</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Saqlash</button>
            <a href="{{ route('teacher.categories.index') }}" class="btn btn-secondary">Ortga</a>
        </form>
    </div>
@endsection