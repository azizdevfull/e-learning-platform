@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Yangi Course qo‘shish</h2>

        <form action="{{ route('teacher.courses.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Course nomi</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Tavsif</label>
                <textarea class="form-control" id="description" name="description" required></textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Kategoriya</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success">Saqlash</button>
            <a href="{{ route('teacher.courses.index') }}" class="btn btn-secondary">Ortga</a>
        </form>
    </div>
@endsection