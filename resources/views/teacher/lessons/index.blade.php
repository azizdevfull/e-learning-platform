@extends('layouts.teacher')

@section('title', $course->title . ' - Darslar')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $course->title }} - Darslar</h2>
                        <p class="text-gray-500">Ushbu kursdagi barcha darslar ro‘yxati.</p>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('teacher.courses.show', $course->id) }}"
                            class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kursga qaytish
                        </a>
                        <a href="{{ route('teacher.courses.lessons.create', $course->id) }}"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Yangi dars qo‘shish
                        </a>
                    </div>
                </div>

                <!-- Lessons List -->
                <div class="rounded-lg border bg-white shadow-sm overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <th class="px-6 py-3">#</th>
                                <th class="px-6 py-3">Dars nomi</th>
                                <th class="px-6 py-3">Fayl</th>
                                <th class="px-6 py-3 text-right">Amallar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($lessons as $lesson)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">
                                        <a href="{{ route('teacher.courses.lessons.show', [$course->id, $lesson->id]) }}"
                                            class="hover:text-primary hover:underline">
                                            {{ $lesson->title }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($lesson->file_path)
                                            <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank"
                                                class="text-primary hover:underline">Fayl</a>
                                        @else
                                            <span class="text-gray-500">Yo‘q</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right flex justify-end gap-2">
                                        <a href="{{ route('teacher.courses.lessons.edit', [$course->id, $lesson->id]) }}"
                                            class="inline-flex items-center rounded-md bg-blue-500 px-3 py-1 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Tahrirlash
                                        </a>
                                        <form
                                            action="{{ route('teacher.courses.lessons.destroy', [$course->id, $lesson->id]) }}"
                                            method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('O‘chirishga ishonchingiz komilmi?')"
                                                class="inline-flex items-center rounded-md bg-red-500 px-3 py-1 text-sm font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                O‘chirish
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-4 text-center text-gray-500">Hozircha darslar yo‘q
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
