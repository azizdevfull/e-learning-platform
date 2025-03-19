@extends('layouts.teacher')

@section('title', 'Testlar')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Testlar</h2>
                        <p class="text-gray-500">Sizning barcha testlaringiz ro‘yxati.</p>
                    </div>
                    <a href="{{ route('teacher.tests.create') }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Yangi test qo‘shish
                    </a>
                </div>

                <!-- Tests Table -->
                <div class="rounded-lg border bg-white shadow-sm overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Test nomi</th>
                                <th class="px-4 py-3">Kurs</th>
                                <th class="px-4 py-3 text-right">Harakatlar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($tests as $test)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $test->id }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $test->title }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $test->course->title }}</td>
                                    <td class="px-4 py-3 text-right flex justify-end gap-2">
                                        <a href="{{ route('teacher.tests.show', $test) }}"
                                            class="inline-flex items-center rounded-md bg-blue-500 px-3 py-1 text-sm font-medium text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                            Ko‘rish
                                        </a>
                                        <a href="{{ route('teacher.tests.edit', $test) }}"
                                            class="inline-flex items-center rounded-md bg-yellow-500 px-3 py-1 text-sm font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2">
                                            Tahrirlash
                                        </a>
                                        <form action="{{ route('teacher.tests.destroy', $test) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('O‘chirishga ishonchingiz komilmi?')"
                                                class="inline-flex items-center rounded-md bg-red-500 px-3 py-1 text-sm font-medium text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                                O‘chirish
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">Hozircha testlar yo‘q</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection