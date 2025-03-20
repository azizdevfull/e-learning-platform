@extends('layouts.app')

@section('title', 'Bosh sahifa')

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6">Bilim olish yanada qulayroq va
                        samaraliroq</h1>
                    <p class="text-lg md:text-xl mb-8 text-indigo-100">EduTeach platformasi orqali istalgan joyda, istalgan
                        vaqtda o‘zingizga qulay tarzda bilim oling.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#courses"
                            class="inline-flex items-center justify-center rounded-md bg-white px-6 py-3 text-base font-medium text-primary hover:bg-gray-50">Kurslarni
                            ko‘rish</a>
                        <a href="#about"
                            class="inline-flex items-center justify-center rounded-md border border-white px-6 py-3 text-base font-medium text-white hover:bg-white hover:bg-opacity-10">Batafsil
                            ma‘lumot</a>
                    </div>
                </div>
                <div class="hidden md:block relative">
                    <img src="{{ asset('images/hero.jpg') }}" alt="Online Learning"
                        class="relative z-10 rounded-lg shadow-xl animate-float">
                </div>
            </div>
        </div>
        <div class="bg-white w-full h-16 rounded-t-[50%] md:rounded-t-[70%] -mb-1"></div>
    </section>

    <!-- Stats Section -->
    <section class="bg-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                <div class="stats-item p-4">
                    <p class="text-3xl md:text-4xl font-bold text-primary">{{ $courses->count() }}</p>
                    <p class="text-gray-600 mt-1">Kurslar</p>
                </div>
                <div class="stats-item p-4">
                    <p class="text-3xl md:text-4xl font-bold text-primary">{{ $students_count }}</p>
                    <p class="text-gray-600 mt-1">O‘quvchilar</p>
                </div>
                <div class="stats-item p-4">
                    <p class="text-3xl md:text-4xl font-bold text-primary">{{ $teachers_count }}</p>
                    <p class="text-gray-600 mt-1">O‘qituvchilar</p>
                </div>
                <div class="stats-item p-4">
                    <p class="text-3xl md:text-4xl font-bold text-primary">95%</p>
                    <p class="text-gray-600 mt-1">Mamnunlik darajasi</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-50" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Nima uchun EduTeach?</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Bizning platformamiz orqali ta‘lim olish qulay,
                    samarali va qiziqarli.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center mb-4">
                        <svg class="h-6 w-6 text-primary feature-icon" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13..." />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sifatli kurslar</h3>
                    <p class="text-gray-600">Barcha kurslar tajribali mutaxassislar tomonidan ishlab chiqilgan.</p>
                </div>
                <!-- Boshqa feature kartochkalar qo‘shiladi -->
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Kategoriyalar</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Qiziqishlaringizga mos kurslarni toping.</p>
            </div>
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($categories as $category)
                    <a href="#{{ $category->slug }}"
                        class="category-pill px-6 py-3 bg-{{ $category->color ?? 'primary' }}-light text-{{ $category->color ?? 'primary' }} font-medium rounded-full hover:bg-{{ $category->color ?? 'primary' }} hover:text-white"
                        data-category="{{ $category->slug }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="py-16 bg-gray-50" id="courses">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Mashhur kurslar</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Eng ko‘p o‘qiladigan kurslarimiz bilan tanishing.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($courses as $course)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden card-hover"
                        data-category="{{ $course->category->slug }}">
                        <div class="relative">
                            <img src="{{ asset('storage/' . $course->image) }}" alt="{{ $course->title }}"
                                class="w-full h-48 object-cover">
                            <div class="absolute top-4 left-4">
                                <span
                                    class="px-3 py-1 bg-{{ $course->category->color ?? 'primary' }} text-white text-xs font-semibold rounded-full">{{ $course->category->name }}</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $course->title }}</h3>
                            <p class="text-gray-600 mb-4 line-clamp-2">{{ $course->description }}</p>
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <div class="flex items-center mr-4">
                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477..." />
                                    </svg>
                                    <span>{{ $course->lessons->count() }} dars</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4.354a4 4 0 110 5.292..." />
                                    </svg>
                                    <span>{{ $course->students->count() }} o‘quvchi</span>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="{{ $course->teacher->profile_photo_url ?? 'https://via.placeholder.com/40' }}"
                                        alt="Teacher" class="h-8 w-8 rounded-full mr-2">
                                    <span class="text-sm font-medium">{{ $course->teacher->name }}</span>
                                </div>
                                <a href="{{ route('student.courses.show', $course->id) }}"
                                    class="text-primary hover:text-primary-hover font-medium text-sm">Batafsil</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection