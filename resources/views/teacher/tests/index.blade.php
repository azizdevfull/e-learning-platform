@extends('layouts.teacher')

@section('content')
    <h2>Testlar</h2>
    <a href="{{ route('teacher.tests.create') }}" class="btn btn-success mb-3">Yangi Test</a>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Test nomi</th>
            <th>Kurs</th>
            <th>Harakatlar</th>
        </tr>
        @foreach($tests as $test)
            <tr>
                <td>{{ $test->id }}</td>
                <td>{{ $test->title }}</td>
                <td>{{ $test->course->title }}</td>
                <td>
                    <a href="{{ route('teacher.tests.show', $test) }}" class="btn btn-info">Ko'rish</a>
                    <a href="{{ route('teacher.tests.edit', $test) }}" class="btn btn-warning">Tahrirlash</a>
                    <form action="{{ route('teacher.tests.destroy', $test) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">O'chirish</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection