@extends('layouts.admin')

@section('title', 'Yangi test qo‘shish')

@section('content')
    <div class="p-6 space-y-6">
        <h1 class="text-3xl font-bold text-gray-900">Yangi test qo‘shish</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.tests.store') }}" method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">Test nomi</label>
                        <input type="text" name="title" id="title" value="{{ old('title') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            placeholder="Test nomini kiriting" required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="course_id" class="block text-sm font-medium text-gray-700">Kurs</label>
                        <select name="course_id" id="course_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            required>
                            <option value="">Kursni tanlang</option>
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
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.tests.index') }}"
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
@endsection
