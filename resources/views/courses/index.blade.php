@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-900">Barcha kurslar</h1>
            <p class="mt-2 text-lg text-gray-600">O'zingizga mos kurslarni toping va o'rganishni boshlang</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Filters -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('courses.index') }}"
                        class=" px-4 py-2 font-medium rounded-full 
                        {{ request('category') ? 'bg-gray-200 text-gray-800' : 'bg-primary text-white' }}">
                        Barchasi
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('courses.index', ['category' => $category->name]) }}"
                            class=" px-4 py-2 font-medium rounded-full 
                            {{ request('category') === $category->name ? 'bg-primary text-white' : 'bg-gray-200 text-gray-800' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Search -->
        <div class="mb-8">
            <div class="relative">
                <input type="text" id="search-input" placeholder="Kurslarni qidirish..."
                    class="w-full rounded-md border-gray-300 py-3 pl-10 pr-4 focus:border-primary focus:outline-none focus:ring-primary">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Courses Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8" id="courses-grid">
            <!-- Course Card 1 -->
            @foreach ($courses as $course)
                <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover" data-category="mathematics">
                    <div class="relative">
                        <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('images/default-course.png') }}"
                            alt="{{ $course->title }}" class="w-full h-48 object-cover">
                        <div class="absolute top-4 left-4">
                            <span
                                class="px-3 py-1 bg-primary text-white text-xs font-semibold rounded-full">{{ $course->category->name }}</span>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold mb-2">{{ $course->title }}</h3>
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $course->description }}</p>
                        <div class="flex items-center text-sm text-gray-500 mb-4">
                            <div class="flex items-center mr-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span>{{ $course->lessons()->count() }} dars</span>
                            </div>
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>{{ $course->students()->count() }} o'quvchi</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="{{ asset('images/default-profile.png') }}" alt="Teacher"
                                    class="h-8 w-8 rounded-full mr-2">
                                <span class="text-sm font-medium">Aziza Karimova</span>
                            </div>
                            <a href="#">
                                <span class="font-bold text-primary">Toliq</span>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- No Results Message (hidden by default) -->
        <div id="no-results" class="hidden py-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400" fill="none"
                viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <h3 class="mt-4 text-lg font-medium text-gray-900">Kurslar topilmadi</h3>
            <p class="mt-2 text-gray-600">Boshqa kalit so'zlar bilan qidirib ko'ring yoki filtrlash parametrlarini
                o'zgartiring.</p>
        </div>

        <!-- Pagination -->
        @if ($courses->hasPages())
            <div class="mt-12 flex justify-center">
                <nav class="flex items-center space-x-2" aria-label="Pagination">
                    {{-- Oldingi sahifa tugmasi --}}
                    @if ($courses->onFirstPage())
                        <span
                            class="relative inline-flex items-center px-2 py-2 rounded-md text-gray-400 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </span>
                    @else
                        <a href="{{ $courses->previousPageUrl() }}"
                            class="pagination-item relative inline-flex items-center px-2 py-2 rounded-md text-gray-400 hover:text-gray-700">
                            <span class="sr-only">Oldingi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                    @endif

                    {{-- Sahifalar --}}
                    @foreach ($courses->getUrlRange(1, $courses->lastPage()) as $page => $url)
                        @if ($page == $courses->currentPage())
                            <span
                                class="pagination-item relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md bg-primary text-white">
                                {{ $page }}
                            </span>
                        @else
                            <a href="{{ $url }}"
                                class="pagination-item relative inline-flex items-center px-4 py-2 text-sm font-medium rounded-md text-gray-700 hover:bg-gray-200">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach

                    {{-- Keyingi sahifa tugmasi --}}
                    @if ($courses->hasMorePages())
                        <a href="{{ $courses->nextPageUrl() }}"
                            class="pagination-item relative inline-flex items-center px-2 py-2 rounded-md text-gray-400 hover:text-gray-700">
                            <span class="sr-only">Keyingi</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    @else
                        <span
                            class="relative inline-flex items-center px-2 py-2 rounded-md text-gray-400 cursor-not-allowed">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </span>
                    @endif
                </nav>
            </div>
        @endif
    </main>
@endsection
