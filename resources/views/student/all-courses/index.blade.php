@extends('layouts.student')

@section('title', 'Kurslar')

@section('content')
    <!-- Main Content -->
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <!-- Courses Content -->
            <div class="space-y-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Kurslar</h2>
                        <p class="text-gray-500">
                            Barcha mavjud kurslar ro'yxati
                        </p>
                    </div>
                </div>

                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach ($courses as $course)
                        <!-- Course Card 1 -->
                        <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover"
                            data-category="{{ $course->category->name }}">
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
                                        <span>{{ $course->lessons->count() }}</span>
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        <span>{{ $course->students->count() }} o'quvchi</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <img src="{{ asset('images/default-profile.png') }}" alt="Teacher"
                                            class="h-8 w-8 rounded-full mr-2">
                                        <span class="text-sm font-medium">{{ $course->teacher->name }}</span>
                                    </div>
                                    <form action="{{ route('student.courses.enroll', $course) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        <button type="submit"
                                            class="text-primary hover:text-primary-hover font-medium text-sm">
                                            Ro'yxatdan o'tish
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $courses->links() }}
            </div>
        </div>
    </main>
@endsection
