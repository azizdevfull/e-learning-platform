@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2 class="mb-3">Testlar ro‘yxati</h2>

        <a href="{{ route('courses.tests.create', $course->id) }}" class="btn btn-success mb-3">Yangi test yaratish</a>

        @if($tests->isEmpty())
            <p>Hozircha testlar mavjud emas.</p>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomi</th>
                        <th>Savollar soni</th>
                        <th>Amallar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tests as $index => $test)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $test->title }}</td>
                            <td>{{ $test->questions->count() }}</td>
                            <td>
                                <a href="{{ route('courses.tests.show', [$course->id, $test->id]) }}" class="btn btn-info">Ko‘rish</a>
                                <a href="#" class="btn btn-warning">Tahrirlash</a>
                                <a href="#" class="btn btn-danger">O‘chirish</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
