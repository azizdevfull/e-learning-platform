@extends('layouts.teacher')

@section('title', 'Talabalar')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Talabalar</h2>
                        <p class="text-gray-500">Sizning kurslaringizga yozilgan barcha talabalar.</p>
                    </div>
                </div>

                <!-- Students Table -->
                <div class="rounded-lg border bg-white shadow-sm overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                                <th class="px-4 py-3">ID</th>
                                <th class="px-4 py-3">Ismi</th>
                                <th class="px-4 py-3">Email</th>
                                <th class="px-4 py-3">Kurslar</th>
                                <th class="px-4 py-3 text-right">Amallar</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($students as $student)
                                <tr>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $student->id }}</td>
                                    <td class="px-4 py-3 font-medium">{{ $student->name }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-500">{{ $student->email }}</td>
                                    <td class="px-4 py-3 text-sm text-gray-500">
                                        @foreach ($student->courses as $course)
                                            <span
                                                class="inline-block bg-gray-200 text-gray-700 px-2 py-1 rounded-md text-xs mr-2 mb-1">
                                                {{ $course->title }}
                                            </span>
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-right">
                                        <a href="{{ route('teacher.students.show', $student->id) }}"
                                            class="text-sm font-medium text-primary hover:underline">Ko‘rish</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-4 py-3 text-center text-gray-500">Hozircha talabalar yo‘q
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
