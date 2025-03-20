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
                        <div class="rounded-lg border bg-white shadow-sm overflow-hidden">
                            <img src="{{ $course->image ? asset('storage/' . $course->image) : asset('images/default-course.png') }}"
                                alt="Web dasturlash asoslari" class="h-48 w-full object-cover">
                            <div class="p-4">
                                <div class="flex items-center justify-between">
                                    <span
                                        class="inline-flex items-center rounded-full bg-gray-100 px-2.5 py-0.5 text-xs font-medium text-gray-800">
                                        {{ $course->category->name }}
                                    </span>
                                </div>
                                <h3 class="mt-2 font-semibold line-clamp-1">{{ $course->title }}</h3>
                                <p class="mt-2 text-sm text-gray-500 line-clamp-2 h-10">
                                    {{ $course->description }}
                                </p>
                                <div class="mt-4 flex items-center justify-between text-sm text-gray-500">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        {{ $course->lessons->count() }} dars
                                    </div>
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-1 h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                        </svg>
                                        {{ $course->students->count() }} talaba
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 border-t">
                                <a href="{{ route('student.courses.show', $course->id) }}"
                                    class="inline-flex w-full items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Korish
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
                {{ $courses->links() }}
            </div>
        </div>
    </main>
@endsection
