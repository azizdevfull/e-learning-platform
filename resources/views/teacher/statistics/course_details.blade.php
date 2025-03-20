@extends('layouts.teacher')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Kurs Sarlavhasi -->
        <div class="mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $course->title }} kursidagi talabalar</h2>
            <p class="mt-2 text-gray-600">Jami talabalar soni: <span
                    class="font-medium text-primary">{{ $course->students->count() }}</span></p>
        </div>

        <!-- Talabalar Jadvali -->
        @if ($students->isEmpty())
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-600">Bu kursda hali talaba yo‘q.</p>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ism</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($students as $student)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="{{ $student->profile_photo_url ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80' }}"
                                                alt="{{ $student->name }}" class="h-10 w-10 rounded-full mr-3">
                                            <span class="text-sm font-medium text-gray-900">{{ $student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $student->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Orqaga qaytish tugmasi -->
        <div class="mt-6">
            <a href="{{ route('teacher.statistics.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Orqaga qaytish
            </a>
        </div>
    </div>
@endsection
