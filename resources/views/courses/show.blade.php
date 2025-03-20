@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="bg-white border-b">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <h1 class="text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
            <p class="mt-2 text-lg text-gray-600">{{ $course->category->name }}</p>
        </div>
    </div>

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @if (session('success'))
            <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Course Details -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('images/default-course.png') }}"
                        alt="{{ $course->title }}" class="w-full h-64 object-cover">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-gray-900 mb-4">{{ $course->title }}</h2>
                        <p class="text-gray-600 mb-6">{{ $course->description }}</p>

                        <div class="space-y-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                </svg>
                                <span>{{ $course->lessons()->count() }} dars</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <span>{{ $course->students()->count() }} o'quvchi</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <img src="{{ $course->teacher->profile_photo_path ? asset('storage/' . $course->teacher->profile_photo_path) : asset('images/default-profile.png') }}"
                                    alt="{{ $course->teacher->name }}" class="h-8 w-8 rounded-full mr-2">
                                <span>{{ $course->teacher->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-md p-6 sticky top-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Kurs haqida</h3>
                    <ul class="space-y-3 text-gray-600">
                        <li>Kategoriya: {{ $course->category->name }}</li>
                        {{-- <li>Davomiyligi: {{ $course->duration ?? 'Noma’lum' }}</li> --}}
                        <li>Darslar soni: {{ $course->lessons()->count() }}</li>
                        <li>O‘quvchilar: {{ $course->students()->count() }}</li>
                    </ul>

                    @if (Auth::check())
                        @if ($isEnrolled)
                            <div class="mt-6 text-center">
                                <span class="inline-block px-4 py-2 bg-green-100 text-green-800 rounded-md font-medium">
                                    Siz bu kursga ro‘yxatdan o‘tgansiz
                                </span>
                            </div>
                        @else
                            <form action="{{ route('student.courses.enroll', $course) }}" method="POST" class="mt-6">
                                @csrf
                                <button type="submit"
                                    class="w-full px-4 py-3 bg-primary text-white rounded-md font-medium hover:bg-primary-hover transition-colors">
                                    Ro‘yxatdan o‘tish
                                </button>
                            </form>
                        @endif
                    @else
                        <div class="mt-6 text-center">
                            <a href="{{ route('login') }}"
                                class="inline-block px-4 py-3 bg-primary text-white rounded-md font-medium hover:bg-primary-hover transition-colors">
                                Ro‘yxatdan o‘tish uchun kirish
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
