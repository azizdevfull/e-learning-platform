@extends('layouts.student')

@section('title', $lesson->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $lesson->title }}</h2>
                        <p class="text-gray-500">{{ $lesson->course->title }} kursidan</p>
                    </div>
                    <a href="{{ route('student.courses.show', $lesson->course->id) }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kursga qaytish
                    </a>
                </div>

                <!-- Lesson Content -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <!-- Content -->
                    <div class="mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Dars mazmuni</h3>
                        <p class="text-gray-700">{{ $lesson->content }}</p>
                    </div>

                    <!-- File Download (if exists) -->
                    @if($lesson->file_path)
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 mb-2">Qo‘shimcha material</h3>
                            <a href="{{ asset('storage/' . $lesson->file_path) }}" download="{{ $lesson->file_path }}"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                </svg>
                                Yuklab olish
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Navigation -->
                <div class="flex justify-between items-center">
                    <span class="text-gray-500">Dars: {{ $lesson->course->lessons->find($lesson->id)->id }} /
                        {{ $lesson->course->lessons->count() }}</span>
                    <div class="flex gap-4">
                        @if($lesson->course->lessons->where('id', '<', $lesson->id)->last())
                            <a href="{{ route('student.lessons.show', [$lesson->course->id, $lesson->course->lessons->where('id', '<', $lesson->id)->last()->id]) }}"
                                class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">
                                Oldingi dars
                            </a>
                        @endif
                        @if($lesson->course->lessons->where('id', '>', $lesson->id)->first())
                            <a href="{{ route('student.lessons.show', [$lesson->course->id, $lesson->course->lessons->where('id', '>', $lesson->id)->first()->id]) }}"
                                class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover">
                                Keyingi dars
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection