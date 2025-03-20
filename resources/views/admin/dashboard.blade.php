@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="p-6 space-y-6">
        <!-- Sarlavha -->
        <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>

        <!-- Statistika Kartochkalari -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Jami foydalanuvchilar</p>
                        <p class="text-2xl font-bold text-primary">{{ $users_count }}</p>
                    </div>
                    <svg class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Jami kurslar</p>
                        <p class="text-2xl font-bold text-primary">{{ $courses_count }}</p>
                    </div>
                    <svg class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13..." />
                    </svg>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Jami testlar</p>
                        <p class="text-2xl font-bold text-primary">{{ $tests_count }}</p>
                    </div>
                    <svg class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow duration-300">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-600">Jami kategoriyalar</p>
                        <p class="text-2xl font-bold text-primary">{{ $categories_count }}</p>
                    </div>
                    <svg class="w-8 h-8 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
            </div>
        </div>

        <!-- Tezkor Havolalar va Oxirgi Faoliyat -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Tezkor havolalar</h2>
                <div class="space-y-3">
                    <a href="{{ route('admin.users.index') }}"
                        class="block px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors duration-200">
                        Foydalanuvchilarni boshqarish
                    </a>
                    <a href="{{ route('admin.courses.index') }}"
                        class="block px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors duration-200">
                        Kurslarni boshqarish
                    </a>
                    <a href="{{ route('admin.tests.index') }}"
                        class="block px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors duration-200">
                        Testlarni boshqarish
                    </a>
                    <a href="{{ route('admin.categories.index') }}"
                        class="block px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors duration-200">
                        Kategoriyalarni boshqarish
                    </a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-semibold text-gray-900 mb-4">Oxirgi faoliyat</h2>
                @if ($recent_activities->isEmpty())
                    <p class="text-sm text-gray-600">Hozircha faoliyat mavjud emas.</p>
                @else
                    <ul class="space-y-3">
                        @foreach ($recent_activities as $activity)
                            {{-- @dd($activity->cause) --}}
                            <li class="text-sm text-gray-600">
                                <span class="font-medium">{{ $activity->causer?->name ?? 'Noma’lum foydalanuvchi' }}</span>
                                {{ $activity->description }}
                                @if ($activity->subject)
                                    <span class="font-medium">
                                        ({{ class_basename($activity->subject_type) }}:
                                        {{ $activity->subject->title ?? ($activity->subject->name ?? $activity->subject_id) }})
                                    </span>
                                @endif
                                <span class="text-xs text-gray-400">({{ $activity->created_at->diffForHumans() }})</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
