@extends('layouts.student')

@section('title', $course->title . ' - Forum')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">{{ $course->title }} - Forum</h2>
                        <p class="text-gray-500">Kurs bo‘yicha muhokamalar</p>
                    </div>
                    <a href="{{ route('student.courses.show', $course->id) }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kursga qaytish
                    </a>
                </div>

                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <form action="{{ route('student.forum.store', $course->id) }}" method="POST" class="mb-6">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <input type="text" name="title" class="rounded-md border-gray-300"
                                placeholder="Yangi mavzu sarlavhasi" required>
                            <button type="submit"
                                class="self-start rounded-md bg-primary px-4 py-2 text-white hover:bg-primary-hover">
                                Mavzu yaratish
                            </button>
                        </div>
                    </form>

                    @forelse($threads as $thread)
                        <div class="py-2 border-b border-gray-200 last:border-b-0">
                            <a href="{{ route('student.forum.show', [$course->id, $thread->id]) }}"
                                class="text-primary hover:underline text-lg">
                                {{ $thread->title }}
                            </a>
                            <p class="text-sm text-gray-500">Yaratuvchi: {{ $thread->user->name }} |
                                {{ $thread->created_at->diffForHumans() }}
                            </p>
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