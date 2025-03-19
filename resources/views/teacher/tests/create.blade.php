@extends('layouts.teacher')

@section('title', 'Yangi Test Yaratish')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Yangi Test Yaratish</h2>
                        <p class="text-gray-500">Yangi test ma'lumotlarini kiriting.</p>
                    </div>
                    <a href="{{ route('teacher.tests.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Ortga
                    </a>
                </div>

                <!-- Form -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <form action="{{ route('teacher.tests.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <!-- Test Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Test nomi</label>
                                <input type="text" id="title" name="title" value="{{ old('title') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('title') border-red-500 @enderror"
                                    required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Course Selection -->
                            <div>
                                <label for="course_id" class="block text-sm font-medium text-gray-700">Kurs tanlang</label>
                                <select id="course_id" name="course_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('course_id') border-red-500 @enderror"
                                    required>
                                    <option value="" disabled selected>Kursni tanlang</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}" {{ old('course_id') == $course->id ? 'selected' : '' }}>
                                            {{ $course->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('course_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="flex gap-4">
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Saqlash
                                </button>
                                <a href="{{ route('teacher.tests.index') }}"
                                    class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Bekor qilish
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection