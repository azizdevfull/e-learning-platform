@extends('layouts.teacher')

@section('title', 'Kurslar ro‘yxati')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Kurslar ro‘yxati</h2>
                        <p class="text-gray-500">Sizning barcha kurslaringiz bu yerda ko‘rsatilgan.</p>
                    </div>
                    <a href="{{ route('teacher.courses.create') }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Yangi kurs qo‘shish
                    </a>
                </div>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="rounded-md bg-green-100 p-4 text-green-800">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Courses Table -->
                <div class="rounded-lg border bg-white shadow-sm overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                                <th class="px-4 py-3">#</th>
                                <th class="px-4 py-3">Nomi</th>
                                <th class="px-4 py-3">Kategoriya</th>
                                <th class="px-4 py-3">Rasm</th>
                                <th class="px-4 py-3 text-right">Amallar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($courses as $course)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $loop->iteration }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $course->title }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $course->category->name }}</td>
                                    <td class="px-4 py-3">
                                        <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('images/default-course.png') }}"
                                            alt="{{ $course->title }}" class="h-10 w-10 object-cover rounded-full">
                                    </td>
                                    <td class="px-4 py-3 text-right flex justify-end gap-2">
                                        <a href="{{ route('teacher.courses.show', $course->id) }}"
                                            class="inline-flex items-center rounded-md bg-primary px-3 py-1 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                            Ko‘rish
                                        </a>
                                        <a href="{{ route('teacher.courses.edit', $course->id) }}"
                                            class="inline-flex items-center rounded-md bg-secondary px-3 py-1 text-sm font-medium text-white hover:bg-secondary-hover focus:outline-none focus:ring-2 focus:ring-secondary focus:ring-offset-2">
                                            Tahrirlash
                                        </a>
                                        <form action="{{ route('teacher.courses.destroy', $course->id) }}" method="POST"
                                            class="inline">
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
                                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">Hozircha kurslar yo‘q
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
