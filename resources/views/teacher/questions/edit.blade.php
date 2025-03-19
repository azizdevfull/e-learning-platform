@extends('layouts.teacher')

@section('title', 'Savolni Tahrirlash: ' . $question->question_text)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Savolni Tahrirlash</h2>
                        <p class="text-gray-500">Savol va javob variantlarini yangilang.</p>
                    </div>
                    <a href="{{ route('teacher.questions.show', $question->id) }}"
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
                    <form action="{{ route('teacher.questions.update', $question->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <!-- Question Text -->
                            <div>
                                <label for="question_text" class="block text-sm font-medium text-gray-700">Savol
                                    matni</label>
                                <input type="text" id="question_text" name="question_text"
                                    value="{{ old('question_text', $question->question_text) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('question_text') border-red-500 @enderror"
                                    required>
                                @error('question_text')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Test Selection -->
                            <div>
                                <label for="test_id" class="block text-sm font-medium text-gray-700">Testni tanlang</label>
                                <select id="test_id" name="test_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('test_id') border-red-500 @enderror"
                                    required>
                                    <option value="" disabled>Testni tanlang</option>
                                    @foreach ($tests as $test)
                                        <option value="{{ $test->id }}"
                                            {{ old('test_id', $question->test_id) == $test->id ? 'selected' : '' }}>
                                            {{ $test->title }} - {{ $test->course->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('test_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Existing Answers -->
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Mavjud Variantlar</h3>
                                <div class="space-y-4" id="existing-answers">
                                    @foreach ($question->answers as $answer)
                                        <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-md answer-item">
                                            <input type="text" name="answers[{{ $answer->id }}][answer_text]"
                                                value="{{ old('answers.' . $answer->id . '.answer_text', $answer->answer_text) }}"
                                                class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('answers.' . $answer->id . '.answer_text') border-red-500 @enderror">
                                            <label class="flex items-center gap-2">
                                                <input type="checkbox" name="answers[{{ $answer->id }}][is_correct]"
                                                    value="1"
                                                    {{ old('answers.' . $answer->id . '.is_correct', $answer->is_correct) ? 'checked' : '' }}
                                                    class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                                <span class="text-sm text-gray-700">To‘g‘ri</span>
                                            </label>
                                            <button type="button" onclick="this.parentElement.remove()"
                                                class="text-red-600 hover:text-red-800 focus:outline-none">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                        @error('answers.' . $answer->id . '.answer_text')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    @endforeach
                                </div>
                            </div>

                            <!-- New Answers -->
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-4">Yangi Variantlar Qo‘shish</h3>
                                <div id="new-answers" class="space-y-4"></div>
                                <button type="button" onclick="addNewAnswer()"
                                    class="mt-2 inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Yangi variant
                                </button>
                            </div>

                            <!-- Submit Button -->
                            <div class="flex gap-4">
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Yangilash
                                </button>
                                <a href="{{ route('teacher.questions.show', $question->id) }}"
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

    <!-- JavaScript for Dynamic Answers -->
    <script>
        let answerCount = {{ $question->answers->count() }};

        function addNewAnswer() {
            const container = document.getElementById('new-answers');
            const newAnswer = document.createElement('div');
            newAnswer.className = 'flex items-center gap-4 p-3 bg-gray-50 rounded-md answer-item';
            newAnswer.innerHTML = `
                <input type="text" name="new_answers[${answerCount}][answer_text]" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm" placeholder="Variant matni">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="new_answers[${answerCount}][is_correct]" value="1" class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <span class="text-sm text-gray-700">To‘g‘ri</span>
                </label>
                <button type="button" onclick="this.parentElement.remove()" class="text-red-600 hover:text-red-800 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            `;
            container.appendChild(newAnswer);
            answerCount++;
        }
    </script>
@endsection
