{{-- resources/views/student/results/index.blade.php --}}
@extends('layouts.student')

@section('content')
    <h2>Test Natijalaringiz</h2>
    <table>
        <tr>
            <th>Test nomi</th>
            <th>Ballar</th>
        </tr>
        @foreach($results as $result)
            <tr>
                <td>{{ $result->test->title }}</td>
                <td>{{ $result->score }}%</td>
            </tr>
        @endforeach
    </table>
@endsection