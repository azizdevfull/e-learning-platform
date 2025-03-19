@extends('layouts.teacher')

@section('title', 'Talaba ma\'lumotlari')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Profil ma'lumotlari -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h2 class="text-2xl font-semibold">{{ $student->name }}</h2>
                    <p>Email: {{ $student->email }}</p>
                </div>

                <!-- Kurslari -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Kurslari</h3>
                    @forelse ($student->courses as $course)
                        <p>{{ $course->title }}</p>
                    @empty
                        <p class="text-gray-500">Bu talaba hali hech qanday kursga yozilmagan.</p>
                    @endforelse
                </div>

                <!-- Test natijalari -->
                <div class="bg-white p-4 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold mb-2">Test natijalari</h3>
                    @if ($student->testResults->isEmpty())
                        <p class="text-gray-500">Hali test natijalari yo‘q.</p>
                    @else
                        <table class="w-full text-left">
                            <thead>
                                <tr class="text-gray-500 text-xs uppercase border-b">
                                    <th class="py-2 px-3">Test nomi</th>
                                    <th class="py-2 px-3">Kurs</th>
                                    <th class="py-2 px-3">Ball</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($student->testResults as $result)
                                    <tr class="border-b">
                                        <td class="py-2 px-3">{{ $result->test->title }}</td>
                                        <td class="py-2 px-3">{{ $result->test->course->title }}</td>
                                        <td class="py-2 px-3">{{ $result->score }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
