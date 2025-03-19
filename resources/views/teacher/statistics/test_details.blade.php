{{-- resources/views/teacher/statistics/test_details.blade.php --}}
@extends('layouts.teacher')

@section('content')
    <h2>{{ $test->title }} testi bo‘yicha natijalar</h2>
    <table>
        <tr>
            <th>Talaba</th>
            <th>Ballar</th>
        </tr>
        @forelse($results as $result)
            <tr>
                <td>{{ $result->student->name }} ({{ $result->student->email }})</td>
                <td>{{ $result->score }}%</td>
            </tr>
        @empty
            <tr>
                <td colspan="2">Hali hech kim bu testni topshirmagan.</td>
            </tr>
        @endforelse
    </table>
@endsection