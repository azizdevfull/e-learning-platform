@extends('layouts.teacher')

@section('title', $lesson->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $lesson->title }}</h2>
                        <p class="text-gray-500">Dars haqida batafsil ma'lumot.</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('teacher.courses.lessons.edit', [$course->id, $lesson->id]) }}"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            Tahrirlash
                        </a>
                        <a href="{{ route('teacher.courses.show', $course->id) }}"
                            class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kursga qaytish
                        </a>
                    </div>
                </div>

                <!-- Lesson Details -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <div class="space-y-6">
                        <!-- Lesson Content -->
                        <div>
                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Dars matni</h3>
                            <p class="text-gray-700 whitespace-pre-wrap">{{ $lesson->content }}</p>
                        </div>

                        <!-- Lesson File -->
                        @if ($lesson->file_path)
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Yuklangan fayl</h3>
                                <p class="text-gray-700">
                                    Fayl:
                                    <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank"
                                        class="text-primary hover:underline">
                                        Ko‘rish/Yuklab olish
                                    </a>
                                </p>
                            </div>
                        @else
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Yuklangan fayl</h3>
                                <p class="text-gray-500">Fayl yuklanmagan.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
