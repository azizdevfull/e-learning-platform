@extends('layouts.teacher')


@section('content')
    <div class="container">
        <h2>Kategoriyalar ro‘yxati</h2>
        <a href="{{ route('teacher.categories.create') }}" class="btn btn-success mb-3">Yangi kategoriya qo‘shish</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nomi</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('teacher.categories.edit', $category->id) }}"
                                class="btn btn-primary">Tahrirlash</a>

                            <form action="{{ route('teacher.categories.destroy', $category->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"
                                    onclick="return confirm('O‘chirishga ishonchingiz komilmi?')">O‘chirish</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection