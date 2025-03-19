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
                    <button id="add-course-btn"
                        class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Yangi kurs qo'shish
                    </button>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-4">
                    <!-- Stat Card 1 -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Kurslar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">8</div>
                        <p class="text-xs text-gray-500">
                            2 ta kurs oxirgi 30 kunda qo'shildi
                        </p>
                    </div>

                    <!-- Stat Card 2 -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Talabalar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">145</div>
                        <p class="text-xs text-gray-500">
                            +22% o'tgan oyga nisbatan
                        </p>
                    </div>

                    <!-- Stat Card 3 -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">Testlar</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">32</div>
                        <p class="text-xs text-gray-500">
                            5 ta test oxirgi hafta qo'shildi
                        </p>
                    </div>

                    <!-- Stat Card 4 -->
                    <div class="rounded-lg border bg-white p-4 shadow-sm">
                        <div class="flex flex-row items-center justify-between space-y-0 pb-2">
                            <h3 class="text-sm font-medium">O'rtacha ball</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                            </svg>
                        </div>
                        <div class="text-2xl font-bold">82%</div>
                        <p class="text-xs text-gray-500">
                            +5% o'tgan oyga nisbatan
                        </p>
                    </div>
                </div>

                <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-7">
                    <!-- Recent Activity -->
                    <div class="lg:col-span-4 rounded-lg border bg-white shadow-sm">
                        <div class="p-4 border-b">
                            <h3 class="font-semibold">So'nggi faoliyat</h3>
                            <p class="text-sm text-gray-500">
                                Oxirgi 7 kundagi faoliyatlar
                            </p>
                        </div>
                        <div class="p-4">
                            <div class="space-y-4">
                                <!-- Activity 1 -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 rounded-full bg-pastel-blue flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Yangi kurs qo'shildi: "Algebra asoslari"</p>
                                        <p class="text-xs text-gray-500">Bugun, 10:30</p>
                                    </div>
                                </div>

                                <!-- Activity 2 -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 rounded-full bg-pastel-green flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-secondary"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">Yangi test yaratildi: "Geometriya - 1-bob"</p>
                                        <p class="text-xs text-gray-500">Kecha, 15:45</p>
                                    </div>
                                </div>

                                <!-- Activity 3 -->
                                <div class="flex items-start">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 rounded-full bg-pastel-gray flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                            </svg>
                                        </div>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">5 ta yangi talaba ro'yxatdan o'tdi</p>
                                        <p class="text-xs text-gray-500">2 kun oldin, 09:15</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Activity 4 -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0 mr-3">
                                    <div class="h-8 w-8 rounded-full bg-pastel-blue flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-primary" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                    </div>
                                </div>
                                <div>
                                    <p class="text-sm font-medium">Statistika yangilandi: "Algebra" kursi</p>
                                    <p class="text-xs text-gray-500">3 kun oldin, 14:20</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Upcoming Tests -->
                <div class="lg:col-span-3 rounded-lg border bg-white shadow-sm">
                    <div class="p-4 border-b">
                        <h3 class="font-semibold">Rejalashtirilgan testlar</h3>
                        <p class="text-sm text-gray-500">
                            Keyingi 7 kun uchun rejalashtirilgan testlar
                        </p>
                    </div>
                    <div class="p-4">
                        <div class="space-y-4">
                            <!-- Test 1 -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium">Algebra - 2-bob</p>
                                    <p class="text-xs text-gray-500">Ertaga, 10:00</p>
                                </div>
                                <span
                                    class="inline-flex items-center rounded-full bg-pastel-blue px-2.5 py-0.5 text-xs font-medium text-primary">
                                    25 talaba
                                </span>
                            </div>

                            <!-- Test 2 -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium">Geometriya - 1-bob</p>
                                    <p class="text-xs text-gray-500">Seshanba, 14:30</p>
                                </div>
                                <span
                                    class="inline-flex items-center rounded-full bg-pastel-blue px-2.5 py-0.5 text-xs font-medium text-primary">
                                    18 talaba
                                </span>
                            </div>

                            <!-- Test 3 -->
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="font-medium">Trigonometriya asoslari</p>
                                    <p class="text-xs text-gray-500">Chorshanba, 09:15</p>
                                </div>
                                <span
                                    class="inline-flex items-center rounded-full bg-pastel-blue px-2.5 py-0.5 text-xs font-medium text-primary">
                                    30 talaba
                                </span>
                            </div>

                            <a href="tests.html"
                                class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                Barcha testlarni ko'rish
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Students -->
            <div class="rounded-lg border bg-white shadow-sm">
                <div class="p-4 border-b flex justify-between items-center">
                    <div>
                        <h3 class="font-semibold">Yangi qo'shilgan talabalar</h3>
                        <p class="text-sm text-gray-500">
                            Oxirgi 30 kunda qo'shilgan talabalar
                        </p>
                    </div>
                    <a href="students.html" class="text-sm text-primary hover:underline">
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
                            <!-- Student 1 -->
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div
                                            class="h-8 w-8 rounded-full bg-pastel-gray flex items-center justify-center mr-3">
                                            <span class="text-sm font-medium text-gray-700">AK</span>
                                        </div>
                                        <div>
                                            <p class="font-medium">Alisher Karimov</p>
                                            <p class="text-xs text-gray-500">alisher@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">Algebra asoslari</td>
                                <td class="px-4 py-3 text-sm text-gray-500">15.03.2023</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                        Faol
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <button class="text-gray-500 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Student 2 -->
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div
                                            class="h-8 w-8 rounded-full bg-pastel-gray flex items-center justify-center mr-3">
                                            <span class="text-sm font-medium text-gray-700">MN</span>
                                        </div>
                                        <div>
                                            <p class="font-medium">Malika Nurmatova</p>
                                            <p class="text-xs text-gray-500">malika@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">Geometriya</td>
                                <td class="px-4 py-3 text-sm text-gray-500">12.03.2023</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">
                                        Faol
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <button class="text-gray-500 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Student 3 -->
                            <tr>
                                <td class="px-4 py-3">
                                    <div class="flex items-center">
                                        <div
                                            class="h-8 w-8 rounded-full bg-pastel-gray flex items-center justify-center mr-3">
                                            <span class="text-sm font-medium text-gray-700">JT</span>
                                        </div>
                                        <div>
                                            <p class="font-medium">Jasur Toshmatov</p>
                                            <p class="text-xs text-gray-500">jasur@example.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3">Trigonometriya</td>
                                <td class="px-4 py-3 text-sm text-gray-500">10.03.2023</td>
                                <td class="px-4 py-3">
                                    <span
                                        class="inline-flex items-center rounded-full bg-yellow-100 px-2.5 py-0.5 text-xs font-medium text-yellow-800">
                                        Kutilmoqda
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <button class="text-gray-500 hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
    </main>
@endsection