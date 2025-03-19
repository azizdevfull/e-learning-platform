@extends('layouts.student')

@section('title', 'Talaba Dashboard')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Dashboard</h2>
                        <p class="text-gray-500">
                            Salom, {{ $student->name }}! Bugun qanday o'qishni rejalashtirdingiz?
                        </p>
                    </div>
                    <a href="{{ route('student.courses.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        Yangi kursni boshlash
                    </a>
                </div>

                <!-- Statistics -->
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
                    <!-- Total Courses -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Kurslar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ $totalCourses }}</div>
                        <p class="text-xs text-gray-500">Siz yozilgan kurslar soni</p>
                    </div>

                    <!-- Total Tests -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Testlar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ $totalTests }}</div>
                        <p class="text-xs text-gray-500">Siz yechgan testlar soni</p>
                    </div>

                    <!-- Average Score -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">O'rtacha ball</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ round($averageScore) }}%</div>
                        <p class="text-xs text-gray-500">Umumiy test natijalari bo‘yicha</p>
                    </div>
                </div>

                <!-- Courses and Tests -->
                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
                    <!-- Current Courses -->
                    <div class="lg:col-span-4 rounded-lg border bg-white shadow-sm">
                        <div class="p-4 border-b">
                            <h3 class="font-semibold">Sizning kurslaringiz</h3>
                            <p class="text-sm text-gray-500">Siz yozilgan kurslar ro‘yxati</p>
                        </div>
                        <div class="p-4">
                            <div class="space-y-4">
                                @forelse ($courses as $course)
                                    <div class="flex items-center justify-between">
                                        <div class="font-medium">
                                            <a href="{{ route('student.courses.show', $course->id) }}"
                                                class="hover:text-primary hover:underline">
                                                {{ $course->title }}
                                            </a>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Hozircha kurslar yo‘q</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Recent Tests -->
                    <div class="lg:col-span-3 rounded-lg border bg-white shadow-sm">
                        <div class="p-4 border-b">
                            <h3 class="font-semibold">Yaqinda yechilgan testlar</h3>
                            <p class="text-sm text-gray-500">Oxirgi 7 kunda yechilgan testlar</p>
                        </div>
                        <div class="p-4">
                            <div class="space-y-4">
                                @forelse ($recentTests as $testResult)
                                    <div class="flex items-center justify-between">
                                        <div class="font-medium">{{ $testResult->test->title }}</div>
                                        <div class="text-sm font-medium">{{ round($testResult->score) }}%</div>
                                    </div>
                                @empty
                                    <p class="text-gray-500">Yaqinda test yechilmagan</p>
                                @endforelse
                                <a href="{{ route('student.tests.index') }}"
                                    class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Barcha testlarni ko'rish
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
