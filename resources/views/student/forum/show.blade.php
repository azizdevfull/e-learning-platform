@extends('layouts.student')

@section('title', $thread->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-3xl font-bold tracking-tight">{{ $thread->title }}</h2>
                    <a href="{{ route('student.forum.index', $course->id) }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600">
                        <svg class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Forumga qaytish
                    </a>
                </div>

                <div class="rounded-lg border bg-white shadow-sm p-6">
                    @forelse($thread->posts as $post)
                        <div class="py-4 border-b border-gray-200 last:border-b-0">
                            <p class="text-gray-700">{{ $post->content }}</p>
                            <p class="text-sm text-gray-500">Muallif: {{ $post->user->name }} |
                                {{ $post->created_at->diffForHumans() }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-500">Hozircha xabarlar mavjud emas.</p>
                    @endforelse

                    <form action="{{ route('student.forum.post.store', [$course->id, $thread->id]) }}" method="POST"
                        class="mt-6">
                        @csrf
                        <div class="flex flex-col gap-2">
                            <textarea name="content" class="rounded-md border-gray-300" rows="4"
                                placeholder="Xabaringizni kiriting" required></textarea>
                            <button type="submit"
                                class="self-start rounded-md bg-primary px-4 py-2 text-white hover:bg-primary-hover">
                                Xabar yuborish
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection