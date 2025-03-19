@extends('layouts.teacher')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <!-- Dashboard Content -->
            <div class="space-y-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Dashboard</h2>
                        <p class="text-gray-500">
                            Xush kelibsiz, {{ Auth::user()->name }}! Bugungi statistikalar va ma'lumotlar.
                        </p>
                    </div>
                    <a href="{{ route('teacher.courses.create') }}"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Yangi kurs qo'shish
                    </a>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Kurslar -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Kurslar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ $totalCourses }}</div>
                        <p class="text-xs text-gray-500">
                            {{ $newCourses }} ta kurs oxirgi 30 kunda qo'shildi
                        </p>
                    </div>

                    <!-- Talabalar -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Talabalar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ $totalStudents }}</div>
                        <p class="text-xs text-gray-500">
                            {{ $growthPercentage >= 0 ? '+' : '' }}{{ $growthPercentage }}% o'tgan oyga nisbatan
                        </p>
                    </div>

                    <!-- Testlar -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Testlar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ $totalTests }}</div>
                        <p class="text-xs text-gray-500">
                            {{ $recentTests }} ta test oxirgi hafta qo'shildi
                        </p>
                    </div>

                    <!-- O'rtacha ball -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">O'rtacha ball</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">{{ number_format($averageScore, 1) }}%</div>
                        <p class="text-xs text-gray-500">
                            {{ $scoreChange >= 0 ? '+' : '' }}{{ $scoreChange }}% o'tgan oyga nisbatan
                        </p>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
                    <!-- So'nggi faoliyat -->
                    <div class="lg:col-span-4 rounded-lg border bg-white shadow-sm">
                        <div class="p-4 border-b">
                            <h3 class="font-semibold">So'nggi faoliyat</h3>
                            <p class="text-sm text-gray-500">Oxirgi 7 kundagi faoliyatlar</p>
                        </div>
                        <div class="p-4 space-y-4">
                            @forelse ($recentActivities as $activity)
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 rounded-full {{ $activity['bg_class'] }} flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 {{ $activity['icon_class'] }}" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="{{ $activity['icon_path'] }}" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">{{ $activity['message'] }}</p>
                                        <p class="text-xs text-gray-500">{{ $activity['timestamp'] }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500">Hozircha faoliyat yo'q</p>
                            @endforelse
                        </div>
                    </div>

                    <!-- Rejalashtirilgan testlar -->
                    <div class="lg:col-span-3 rounded-lg border bg-white shadow-sm">
                        <div class="p-4 border-b">
                            <h3 class="font-semibold">Rejalashtirilgan testlar</h3>
                            <p class="text-sm text-gray-500">Keyingi 7 kun uchun rejalashtirilgan testlar</p>
                        </div>
                        <div class="p-4 space-y-4">
                            @forelse ($upcomingTests as $test)
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="font-medium">{{ $test->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $test->created_at->addDays(7)->format('D, H:i') }}</p>
                                    </div>
                                    <span class="inline-flex items-center rounded-full bg-pastel-blue px-2.5 py-0.5 text-xs font-medium text-primary">
                                        {{ $test->course->students()->count() }} talaba
                                    </span>
                                </div>
                            @empty
                                <p class="text-gray-500">Hozircha testlar yo'q</p>
                            @endforelse
                            <a href="{{ route('teacher.tests.index') }}"
                                class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                Barcha testlarni ko'rish
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Yangi qo'shilgan talabalar -->
                <div class="rounded-lg border bg-white shadow-sm">
                    <div class="p-4 border-b flex justify-between items-center">
                        <div>
                            <h3 class="font-semibold">Yangi qo'shilgan talabalar</h3>
                            <p class="text-sm text-gray-500">Oxirgi 30 kunda qo'shilgan talabalar</p>
                        </div>
                        <a href="{{ route('teacher.statistics.index') }}" class="text-sm text-primary hover:underline">
                            Barchasini ko'rish
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <th class="px-4 py-3">Talaba</th>
                                    <th class="px-4 py-3">Kurs</th>
                                    <th class="px-4 py-3">Qo'shilgan sana</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-right">Amallar</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @forelse ($recentStudents as $enrollment)
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <div class="h-8 w-8 rounded-full bg-pastel-gray flex items-center justify-center mr-3">
                                                    <span class="text-sm font-medium text-gray-700">
                                                        {{ strtoupper(substr($enrollment->user->name, 0, 2)) }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <p class="font-medium">{{ $enrollment->user->name }}</p>
                                                    <p class="text-xs text-gray-500">{{ $enrollment->user->email }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3">{{ $enrollment->course->title }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-500">{{ $enrollment->created_at->format('d.m.Y') }}</td>
                                        <td class="px-4 py-3">
                                            <span class="inline-flex items-center rounded-full {{ $enrollment->user->isStudent() ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }} px-2.5 py-0.5 text-xs font-medium">
                                                {{ $enrollment->user->isStudent() ? 'Faol' : 'Kutilmoqda' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-right">
                                            <a href="{{ route('teacher.statistics.course.details', $enrollment->course->id) }}" class="text-gray-500 hover:text-primary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                    viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-4 py-3 text-gray-500">Hozircha talabalar yo'q</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection