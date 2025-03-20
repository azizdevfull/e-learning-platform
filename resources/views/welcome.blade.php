@extends('layouts.app')

@section('title', 'Bosh sahifa')

@section('content')
    <!-- Hero Section -->
    <section class="hero-gradient text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight mb-6">Bilim olish yanada qulayroq
                        va samaraliroq</h1>
                    <p class="text-lg md:text-xl mb-8 text-indigo-100">EduTeach platformasi orqali istalgan joyda,
                        istalgan vaqtda o'zingizga qulay tarzda bilim oling va kasbiy ko'nikmalaringizni oshiring.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#courses"
                            class="inline-flex items-center justify-center rounded-md bg-white px-6 py-3 text-base font-medium text-primary hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-white">
                            Kurslarni ko'rish
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="#about"
                            class="inline-flex items-center justify-center rounded-md border border-white px-6 py-3 text-base font-medium text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                            Batafsil ma'lumot
                        </a>
                    </div>
                </div>
                <div class="hidden md:block relative">
                    <div class="absolute -top-6 -left-6 w-20 h-20 bg-secondary rounded-full opacity-20 animate-pulse-slow">
                    </div>
                    <div
                        class="absolute -bottom-10 -right-10 w-32 h-32 bg-accent rounded-full opacity-20 animate-pulse-slow">
                    </div>
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80"
                        alt="Online Learning" class="relative z-10 rounded-lg shadow-xl animate-float">
                </div>
            </div>
        </div>
        <div class="bg-white w-full h-16 rounded-t-[50%] md:rounded-t-[70%] -mb-1"></div>
    </section>

    <!-- Stats Section -->
    <section class="bg-white py-12">
        <x-welcome.stats></x-welcome.stats>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-gray-50" id="about">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-gray-900">Nima uchun EduTeach?</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Bizning platformamiz orqali ta'lim olish
                    qulay, samarali va qiziqarli. Quyidagi afzalliklarimiz bilan tanishing.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-primary-light rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary feature-icon" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sifatli kurslar</h3>
                    <p class="text-gray-600">Barcha kurslarimiz tajribali mutaxassislar tomonidan ishlab chiqilgan
                        va doimiy yangilanib turadi.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-secondary-light rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-secondary feature-icon" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Qulay vaqt</h3>
                    <p class="text-gray-600">Istalgan vaqtda, istalgan joyda o'zingizga qulay tarzda o'qish
                        imkoniyati.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-accent-light rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-accent feature-icon" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sertifikatlar</h3>
                    <p class="text-gray-600">Kurslarni muvaffaqiyatli yakunlaganingizdan so'ng rasmiy sertifikatlar
                        bilan taqdirlanasiz.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-pastel-purple rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 feature-icon" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Jamiyat</h3>
                    <p class="text-gray-600">Bir xil qiziqishlarga ega bo'lgan odamlar bilan muloqot qilish va
                        tajriba almashish imkoniyati.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-pastel-pink rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600 feature-icon" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Interaktiv ta'lim</h3>
                    <p class="text-gray-600">Interaktiv mashqlar, testlar va loyihalar orqali bilimlaringizni
                        mustahkamlang.</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md feature-card">
                    <div class="h-12 w-12 bg-pastel-blue rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 feature-icon" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 15a4 4 0 004 4h9a4 4 0 004-4M3 15l4-4m0 0l4 4m-4-4v12" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Doimiy qo'llab-quvvatlash</h3>
                    <p class="text-gray-600">O'qituvchilar va mentorlar tomonidan doimiy qo'llab-quvvatlash va
                        maslahatlar.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <x-categories></x-categories>
    </section>

    <!-- Courses Section -->
    <section class="py-16 bg-gray-50" id="courses">
        <x-courses></x-courses>
    </section>

    <!-- Testimonials Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">O'quvchilarimiz fikrlari</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Platformamizdan foydalangan o'quvchilarimiz
                    fikrlari bilan tanishing.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <x-welcome.testimonials />
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-4">Hoziroq o'rganishni boshlang</h2>
                    <p class="text-indigo-100 mb-8">EduTeach platformasiga qo'shiling va o'z bilimlaringizni
                        oshiring. Ro'yxatdan o'tish bepul va bir necha daqiqa vaqtingizni oladi.</p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="{{ route('register') }}"
                            class="inline-flex items-center justify-center rounded-md bg-white px-6 py-3 text-base font-medium text-primary hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-white">
                            Ro'yxatdan o'tish
                        </a>
                        <a href="#courses"
                            class="inline-flex items-center justify-center rounded-md border border-white px-6 py-3 text-base font-medium text-white hover:bg-white hover:bg-opacity-10 focus:outline-none focus:ring-2 focus:ring-white">
                            Kurslarni ko'rish
                        </a>
                    </div>
                </div>
                <div class="hidden md:block">
                    <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&h=400&q=80"
                        alt="Learning" class="rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="py-16 bg-white" id="contact">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900">Biz bilan bog'laning</h2>
                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Savollaringiz bormi? Biz bilan bog'laning va biz
                    sizga yordam beramiz.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    @if (session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Ism familiya</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                    placeholder="Ism familiyangizni kiriting" required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="email" id="email" name="email" value="{{ old('email') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                    placeholder="Email manzilingizni kiriting" required>
                                @error('email')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700">Mavzu</label>
                                <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                    placeholder="Xabar mavzusini kiriting" required>
                                @error('subject')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700">Xabar</label>
                                <textarea id="message" name="message" rows="4"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                                    placeholder="Xabaringizni kiriting" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Yuborish
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="bg-gray-50 p-6 rounded-lg shadow-sm h-full">
                        <h3 class="text-xl font-bold mb-4">Aloqa ma'lumotlari</h3>
                        <div class="space-y-4">
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-1 mr-3"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <div>
                                    <h4 class="font-medium">Manzil</h4>
                                    <p class="text-gray-600">Toshkent shahri, Yunusobod tumani, 4-mavze, 12-uy</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-1 mr-3"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <h4 class="font-medium">Email</h4>
                                    <p class="text-gray-600"><a href="mailto:info@example.com">info@example.com</a></p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-1 mr-3"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <div>
                                    <h4 class="font-medium">Telefon</h4>
                                    <p class="text-gray-600">+998 90 123 45 67</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-primary mt-1 mr-3"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <div>
                                    <h4 class="font-medium">Ish vaqti</h4>
                                    <p class="text-gray-600">Dushanba - Juma: 9:00 - 18:00</p>
                                    <p class="text-gray-600">Shanba: 9:00 - 14:00</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6">
                            <h4 class="font-medium mb-2">Ijtimoiy tarmoqlar</h4>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-600 hover:text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                                    </svg>
                                </a>
                                <!-- Boshqa ijtimoiy tarmoqlar ikonkalari -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
