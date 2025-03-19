@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Course'lar ro‘yxati</h2>
        <a href="{{ route('teacher.courses.create') }}" class="btn btn-success mb-3">Yangi Course qo‘shish</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nomi</th>
                    <th>Kategoriya</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($courses as $course)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $course->title }}</td>
                        <td>{{ $course->category->name }}</td>
                        <td>
                            <a href="{{ route('teacher.courses.edit', $course->id) }}" class="btn btn-primary">Tahrirlash</a>
                            <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST" class="d-inline">
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