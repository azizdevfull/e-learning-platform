@extends('layouts.student')

@section('title', $course->title . ' Kursi')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $course->title }} Kursi</h2>
                        <p class="text-gray-500">{{ $course->description }}</p>
                    </div>
                    <a href="{{ route('student.courses.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kurslarga qaytish
                    </a>
                </div>

                <!-- Lessons Section -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <h4 class="text-xl font-semibold text-gray-900 mb-4">Darslar</h4>
                    @forelse($course->lessons as $lesson)
                        <div class="py-2 border-b border-gray-200 last:border-b-0">
                            <a href="{{ route('student.lessons.show', [$course->id, $lesson->id]) }}"
                                class="text-primary hover:underline text-lg">
                                {{ $lesson->title }}
                            </a>
                        </div>
                    @empty
                        <p class="text-gray-500">Hozircha bu kursda darslar mavjud emas.</p>
                    @endforelse
                </div>

                <!-- Additional Info (Optional) -->
                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Darslar soni: {{ $course->lessons->count() }}</span>
                    <a href="{{ route('student.tests.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Testlarni ko‘rish
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection