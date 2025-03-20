@extends('layouts.admin')

@section('title', $test->title)

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $test->title }}</h1>
            <div class="space-x-2">
                <a href="{{ route('admin.tests.edit', $test) }}"
                    class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors">
                    Tahrirlash
                </a>
                <a href="{{ route('admin.tests.questions.create', $test) }}"
                    class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 transition-colors">
                    Yangi savol qo‘shish
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
            <div>
                <p class="text-sm text-gray-600">Kurs: <span class="font-medium">{{ $test->course->title }}</span></p>
                <p class="text-sm text-gray-600">Savollar soni: <span
                        class="font-medium">{{ $test->questions->count() }}</span></p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Savollar</h2>
            <div class="space-y-6">
                @forelse ($test->questions as $question)
                    <div class="border rounded-md p-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-medium text-gray-900">{{ $question->question_text }}</h3>
                            <div class="space-x-2">
                                <a href="{{ route('admin.tests.questions.edit', [$test, $question]) }}"
                                    class="text-primary hover:text-primary-hover">Tahrirlash</a>
                                <form action="{{ route('admin.tests.questions.destroy', [$test, $question]) }}"
                                    method="POST" class="inline-block"
                                    onsubmit="return confirm('Bu savolni o‘chirishni xohlaysizmi?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">O‘chirish</button>
                                </form>
                            </div>
                        </div>
                        <ul class="mt-2 space-y-1">
                            @foreach ($question->answers as $answer)
                                <li class="text-sm {{ $answer->is_correct ? 'text-green-600' : 'text-gray-600' }}">
                                    {{ $answer->answer_text }} {{ $answer->is_correct ? '(To‘g‘ri)' : '' }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @empty
                    <p class="text-sm text-gray-600">Hozircha savollar mavjud emas.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
