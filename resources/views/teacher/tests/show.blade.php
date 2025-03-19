@extends('layouts.teacher')

@section('title', 'Test: ' . $test->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Test Tafsilotlari</h2>
                        <p class="text-gray-500">Test va unga tegishli savollar haqida ma'lumot.</p>
                    </div>
                    <a href="{{ route('teacher.tests.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Orqaga
                    </a>
                </div>

                <!-- Test Details -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Test nomi</h3>
                            <p class="text-gray-600">{{ $test->title }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kurs</h3>
                            <p class="text-gray-600">{{ $test->course->title }}</p>
                        </div>
                    </div>
                </div>

                <!-- Add New Question Form -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Yangi Savol Qo‘shish</h3>
                    <form action="{{ route('teacher.questions.store') }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <!-- Hidden Test ID -->
                            <input type="hidden" name="test_id" value="{{ $test->id }}">

                            <!-- Question Text -->
                            <div>
                                <label for="question_text" class="block text-sm font-medium text-gray-700">Savol
                                    matni</label>
                                <input type="text" id="question_text" name="question_text"
                                    value="{{ old('question_text') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('question_text') border-red-500 @enderror"
                                    required>
                                @error('question_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div>
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Saqlash
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Questions Section -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Savollar</h3>
                    <div class="space-y-6">
                        @forelse ($questions as $question)
                            <div class="border-b pb-4 last:border-b-0">
                                <div class="flex items-center justify-between">
                                    <h4 class="text-lg font-medium text-gray-800">
                                        <a href="{{ route('teacher.questions.show', $question) }}"
                                            class="hover:underline text-primary">
                                            {{ $loop->iteration }}. {{ $question->question_text }}
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-500">Hozircha savollar yo‘q</p>
                        @endforelse
                        {{ $questions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
