@extends('layouts.teacher')

@section('title', 'Savol: ' . $question->question_text)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Savol: {{ $question->question_text }}</h2>
                        <p class="text-gray-500">Savol va unga tegishli variantlar haqida ma'lumot.</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('teacher.questions.index') }}"
                            class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Ortga qaytish
                        </a>
                        <a href="{{ route('teacher.questions.edit', $question->id) }}"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                            Tahrirlash
                        </a>
                    </div>
                </div>

                <!-- Question Details -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Test</h3>
                            <p class="text-gray-600">{{ $question->test->title }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kurs</h3>
                            <p class="text-gray-600">{{ $question->test->course->title }}</p>
                        </div>
                    </div>
                </div>

                <!-- Answers Section -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Javob Variantlari</h3>
                    @if ($question->answers->isEmpty())
                        <p class="text-gray-500">Hozircha javob variantlari mavjud emas.</p>
                    @else
                        <ul class="space-y-3">
                            @foreach ($question->answers as $answer)
                                <li class="flex items-center justify-between p-3 bg-gray-50 rounded-md">
                                    <span class="text-gray-700">{{ $answer->answer_text }}</span>
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium
                                        {{ $answer->is_correct ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                        {{ $answer->is_correct ? '✅ To‘g‘ri' : '❌ Noto‘g‘ri' }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
