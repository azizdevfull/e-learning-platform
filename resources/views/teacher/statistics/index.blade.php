@extends('layouts.teacher')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Kurslar Statistikasi -->
        <div class="mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Kurslar Statistikasi</h2>
            @if ($courses->isEmpty())
                <p class="text-gray-600">Hozircha kurslar mavjud emas.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($courses as $course)
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 mb-4">Talabalar soni: <span
                                    class="font-medium text-primary">{{ $course->students->count() }}</span></p>
                            <a href="{{ route('teacher.statistics.course.details', $course) }}"
                                class="inline-flex items-center text-sm font-medium text-primary hover:text-primary-hover">
                                Batafsil ko‘rish
                                <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Testlar Statistikasi -->
        <div>
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6">Testlar Statistikasi</h2>
            @if ($tests->isEmpty())
                <p class="text-gray-600">Hozircha testlar mavjud emas.</p>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($tests as $test)
                        <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $test->title }}</h3>
                            <p class="text-gray-600 mb-4">Savollar soni: <span
                                    class="font-medium text-primary">{{ $test->questions->count() }}</span></p>
                            <a href="{{ route('teacher.statistics.test.details', $test) }}"
                                class="inline-flex items-center text-sm font-medium text-primary hover:text-primary-hover">
                                Batafsil ko‘rish
                                <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
