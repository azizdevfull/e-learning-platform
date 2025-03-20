@extends('layouts.teacher') <!-- O‘qituvchi uchun layout mavjud deb taxmin qilamiz -->

@section('title', $course->title . ' - Forum')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $course->title }} - Forum</h2>
                        <p class="text-gray-500">Kurs bo‘yicha talabalar muhokamalari</p>
                    </div>
                    <a href="{{ route('teacher.courses.show', $course->id) }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kursga qaytish
                    </a>
                </div>

                <div class="rounded-lg border bg-white shadow-sm p-6">
                    @forelse($threads as $thread)
                        <div class="py-2 border-b border-gray-200 last:border-b-0">
                            <a href="{{ route('teacher.forum.show', [$course->id, $thread->id]) }}"
                                class="text-primary hover:underline text-lg">
                                {{ $thread->title }}
                            </a>
                            <p class="text-sm text-gray-500">Yaratuvchi: {{ $thread->user->name }} |
                                {{ $thread->created_at->diffForHumans() }}</p>
                            <span class="text-sm text-gray-500">Xabarlar: {{ $thread->posts->count() }}</span>
                        </div>
                    @empty
                        <p class="text-gray-500">Hozircha mavzular mavjud emas.</p>
                    @endforelse

                    <div class="mt-4">
                        {{ $threads->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection