@extends('layouts.student')

@section('title', 'Testlar')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Testlar</h2>
                        <p class="text-gray-500">Sizning kurslaringizdagi testlar ro‘yxati</p>
                    </div>
                    <a href="{{ route('student.courses.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kurslarga qaytish
                    </a>
                </div>

                <!-- Tests List -->
                <div class="space-y-6">
                    @forelse ($enrolledCourses as $enrollment)
                        <div class="rounded-lg border bg-white shadow-sm">
                            <div class="p-4 border-b">
                                <h4 class="text-xl font-semibold text-gray-900">{{ $enrollment->course->title }}</h4>
                            </div>
                            <ul class="divide-y divide-gray-200">
                                @forelse ($enrollment->course->tests as $test)
                                    <li class="p-4 hover:bg-gray-50">
                                        <a href="{{ route('student.tests.show', $test->id) }}"
                                            class="block text-gray-700 hover:text-primary">
                                            {{ $test->title }}
                                        </a>
                                    </li>
                                @empty
                                    <li class="p-4 text-gray-500">Bu kursda testlar yo‘q</li>
                                @endforelse
                            </ul>
                        </div>
                    @empty
                        <div class="rounded-lg border bg-white shadow-sm p-6 text-center">
                            <p class="text-gray-500">Hozircha kurslarga yozilmagansiz yoki testlar yo‘q</p>
                            <a href="{{ route('student.courses.index') }}"
                                class="mt-2 inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                Kurslarni ko‘rish
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
