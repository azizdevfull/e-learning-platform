@extends('layouts.teacher')

@section('title', 'Kurs: ' . $course->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Kurs: {{ $course->title }}</h2>
                        <p class="text-gray-500">Kurs haqida umumiy ma'lumotlar.</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('teacher.courses.edit', $course->id) }}"
                            class="inline-flex items-center justify-center rounded-md bg-secondary px-4 py-2 text-sm font-medium text-white hover:bg-secondary-hover focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                            Tahrirlash
                        </a>
                        <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('O‘chirishga ishonchingiz komilmi?')"
                                class="inline-flex items-center justify-center rounded-md bg-red-500 px-4 py-2 text-sm font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                O‘chirish
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="rounded-md bg-green-100 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Course Details -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kurs nomi</h3>
                            <p class="text-gray-600">{{ $course->title }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Kategoriya</h3>
                            <p class="text-gray-600">{{ $course->category->name }}</p>
                        </div>
                        <div class="md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-900">Tavsif</h3>
                            <p class="text-gray-600">{{ $course->description ?? 'Tavsif mavjud emas' }}</p>
                        </div>
                    </div>
                    <div class="mt-6">
                        <a href="{{ route('teacher.courses.lessons.index', $course) }}"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            Darslar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection