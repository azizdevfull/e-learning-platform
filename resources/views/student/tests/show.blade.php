@extends('layouts.student')

@section('title', $test->title . ' - Test')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $test->title }}</h2>
                        <p class="text-gray-500">Testni diqqat bilan yeching va javoblarni tanlang</p>
                    </div>
                    <a href="{{ route('student.tests.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Testlarga qaytish
                    </a>
                </div>

                <!-- Test Form -->
                <form action="{{ route('student.tests.submit', $test->id) }}" method="POST" class="space-y-6">
                    @csrf

                    @forelse ($questions as $question)
                        <div class="rounded-lg border bg-white shadow-sm p-6">
                            <h4 class="text-xl font-semibold text-gray-900 mb-4">{{ $question->question_text }}</h4>
                            <div class="space-y-4">
                                @forelse ($question->answers as $answer)
                                    <label class="flex items-center gap-3 cursor-pointer">
                                        <input type="radio" name="question_{{ $question->id }}"
                                            value="{{ $answer->id }}"
                                            class="h-4 w-4 text-primary border-gray-300 focus:ring-primary" required>
                                        <span class="text-gray-700">{{ $answer->answer_text }}</span>
                                    </label>
                                @empty
                                    <p class="text-gray-500">Javob variantlari yo‘q</p>
                                @endforelse
                            </div>
                            @error("question_{$question->id}")
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    @empty
                        <div class="rounded-lg border bg-white shadow-sm p-6 text-center">
                            <p class="text-gray-500">Bu testda savollar yo‘q</p>
                        </div>
                    @endforelse

                    <!-- Submit Button -->
                    <div class="flex justify-end">
                        <button type="submit"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-6 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            Testni topshirish
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
