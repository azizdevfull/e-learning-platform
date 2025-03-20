@extends('layouts.admin')

@section('title', 'Yangi savol qo‘shish')

@section('content')
    <div class="p-6 space-y-6">
        <h1 class="text-3xl font-bold text-gray-900">Yangi savol qo‘shish - {{ $test->title }}</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.tests.questions.store', $test) }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="question_text" class="block text-sm font-medium text-gray-700">Savol matni</label>
                        <textarea name="question_text" id="question_text" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            placeholder="Savolni kiriting" required>{{ old('question_text') }}</textarea>
                        @error('question_text')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div id="answers-container" class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Javoblar</label>
                        @for ($i = 0; $i < 2; $i++)
                            <div class="flex items-center space-x-2 answer-group">
                                <input type="text" name="answers[{{ $i }}][answer_text]"
                                    value="{{ old("answers.$i.answer_text") }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                    placeholder="Javob matnini kiriting" required>
                                <input type="checkbox" name="answers[{{ $i }}][is_correct]" value="1"
                                    class="mt-1 h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded"
                                    {{ old("answers.$i.is_correct") ? 'checked' : '' }}>
                                <span class="text-sm text-gray-600">To‘g‘ri</span>
                                @if ($i >= 2)
                                    <button type="button"
                                        class="remove-answer text-red-600 hover:text-red-800">O‘chirish</button>
                                @endif
                            </div>
                        @endfor
                        @error('answers')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="button" id="add-answer"
                        class="px-3 py-1 bg-primary text-white rounded-md text-sm hover:bg-primary-hover">
                        Javob qo‘shish
                    </button>

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.tests.show', $test) }}"
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Bekor qilish
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md text-sm font-medium hover:bg-primary-hover">
                            Saqlash
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.getElementById('add-answer').addEventListener('click', function() {
            const container = document.getElementById('answers-container');
            const count = container.querySelectorAll('.answer-group').length;
            const newAnswer = `
                <div class="flex items-center space-x-2 answer-group">
                    <input type="text" name="answers[${count}][answer_text]" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm" placeholder="Javob matnini kiriting" required>
                    <input type="checkbox" name="answers[${count}][is_correct]" value="1" class="mt-1 h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                    <span class="text-sm text-gray-600">To‘g‘ri</span>
                    <button type="button" class="remove-answer text-red-600 hover:text-red-800">O‘chirish</button>
                </div>`;
            container.insertAdjacentHTML('beforeend', newAnswer);
        });

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-answer')) {
                e.target.parentElement.remove();
            }
        });
    </script>
@endsection
