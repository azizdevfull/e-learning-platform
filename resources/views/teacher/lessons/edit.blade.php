@extends('layouts.teacher')

@section('title', 'Darsni Tahrirlash: ' . $lesson->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Darsni Tahrirlash</h2>
                        <p class="text-gray-500">Dars nomi, matni va faylini yangilang.</p>
                    </div>
                    <a href="{{ route('teacher.courses.lessons.show', [$course->id, $lesson->id]) }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Ortga
                    </a>
                </div>

                <!-- Form -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    <form action="{{ route('teacher.courses.lessons.update', [$course->id, $lesson->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-6">
                            <!-- Lesson Title -->
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Dars nomi</label>
                                <input type="text" id="title" name="title"
                                    value="{{ old('title', $lesson->title) }}"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('title') border-red-500 @enderror"
                                    required>
                                @error('title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Lesson Content with Tiptap (Preline Style) -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">Dars matni</label>
                                <div class="bg-white border border-gray-200 rounded-xl overflow-hidden">
                                    <div id="hs-editor-tiptap">
                                        <div
                                            class="sticky top-0 bg-white flex align-middle gap-x-0.5 border-b border-gray-200 p-2">
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-bold="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M14 12a4 4 0 0 0 0-8H6v8"></path>
                                                    <path d="M15 20a4 4 0 0 0 0-8H6v8Z"></path>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-italic="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <line x1="19" x2="10" y1="4" y2="4">
                                                    </line>
                                                    <line x1="14" x2="5" y1="20" y2="20">
                                                    </line>
                                                    <line x1="15" x2="9" y1="4" y2="20">
                                                    </line>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-underline="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M6 4v6a6 6 0 0 0 12 0V4"></path>
                                                    <line x1="4" x2="20" y1="20" y2="20">
                                                    </line>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-strike="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M16 4H9a3 3 0 0 0-2.83 4"></path>
                                                    <path d="M14 12a4 4 0 0 1 0 8H6"></path>
                                                    <line x1="4" x2="20" y1="12" y2="12">
                                                    </line>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-link="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71">
                                                    </path>
                                                    <path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-ol="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <line x1="10" x2="21" y1="6" y2="6">
                                                    </line>
                                                    <line x1="10" x2="21" y1="12" y2="12">
                                                    </line>
                                                    <line x1="10" x2="21" y1="18" y2="18">
                                                    </line>
                                                    <path d="M4 6h1v4"></path>
                                                    <path d="M4 10h2"></path>
                                                    <path d="M6 18H4c0-1 2-2 2-3s-1-1.5-2-1"></path>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-ul="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <line x1="8" x2="21" y1="6" y2="6">
                                                    </line>
                                                    <line x1="8" x2="21" y1="12" y2="12">
                                                    </line>
                                                    <line x1="8" x2="21" y1="18" y2="18">
                                                    </line>
                                                    <line x1="3" x2="3.01" y1="6" y2="6">
                                                    </line>
                                                    <line x1="3" x2="3.01" y1="12" y2="12">
                                                    </line>
                                                    <line x1="3" x2="3.01" y1="18" y2="18">
                                                    </line>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-blockquote="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="M17 6H3"></path>
                                                    <path d="M21 12H8"></path>
                                                    <path d="M21 18H8"></path>
                                                    <path d="M3 12v6"></path>
                                                </svg>
                                            </button>
                                            <button
                                                class="size-8 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                                                type="button" data-hs-editor-code="">
                                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                    width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <path d="m18 16 4-4-4-4"></path>
                                                    <path d="m6 8-4 4 4 4"></path>
                                                    <path d="m14.5 4-5 16"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="h-40 overflow-auto prose max-w-none" data-hs-editor-field>
                                            {!! old('content', $lesson->content) !!}
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="content" id="content-hidden">
                                @error('content')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- File Upload -->
                            <div>
                                <label for="file" class="block text-sm font-medium text-gray-700">Fayl yuklash (PDF,
                                    DOCX, MP4, JPG, PNG)</label>
                                <input type="file" id="file" name="file"
                                    class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-hover">
                                @error('file')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                @if ($lesson->file_path)
                                    <p class="mt-2 text-sm text-gray-600">
                                        Hozirgi fayl:
                                        <a href="{{ asset('storage/' . $lesson->file_path) }}" target="_blank"
                                            class="text-primary hover:underline">
                                            Ko‘rish/Yuklab olish
                                        </a>
                                    </p>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="flex gap-4">
                                <button type="submit"
                                    class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                                    Yangilash
                                </button>
                                <a href="{{ route('teacher.courses.lessons.show', [$course->id, $lesson->id]) }}"
                                    class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                                    Bekor qilish
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('styles')
    <style>
        .ProseMirror:focus {
            outline: none;
        }

        .tiptap ul p,
        .tiptap ol p {
            display: inline;
        }

        .tiptap p.is-editor-empty:first-child::before {
            content: attr(data-placeholder);
            float: left;
            height: 0;
            pointer-events: none;
        }
    </style>
@endsection

@section('scripts')
    <!-- Prosemirror-model versiya moslashuvi uchun importmap -->
    <script type="importmap">
        {
            "imports": {
                "https://esm.sh/v135/prosemirror-model@1.19.3/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.20.0/es2022/prosemirror-model.mjs",
                "https://esm.sh/v135/prosemirror-model@1.21.0/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.20.0/es2022/prosemirror-model.mjs",
                "https://esm.sh/v135/prosemirror-model@1.22.1/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.20.0/es2022/prosemirror-model.mjs",
                "https://esm.sh/v135/prosemirror-model@1.23.0/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.20.0/es2022/prosemirror-model.mjs",
                "https://esm.sh/v135/prosemirror-model@1.24.0/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.20.0/es2022/prosemirror-model.mjs",
                "https://esm.sh/v135/prosemirror-model@1.24.1/es2022/prosemirror-model.mjs": "https://esm.sh/v135/prosemirror-model@1.20.0/es2022/prosemirror-model.mjs"
            }
        }
    </script>

    <!-- Tiptap va extension’lar -->
    <script type="module">
        import {
            Editor
        } from 'https://esm.sh/@tiptap/core@2.11.0';
        import StarterKit from 'https://esm.sh/@tiptap/starter-kit@2.11.0';
        import Placeholder from 'https://esm.sh/@tiptap/extension-placeholder@2.11.0';
        import Paragraph from 'https://esm.sh/@tiptap/extension-paragraph@2.11.0';
        import Bold from 'https://esm.sh/@tiptap/extension-bold@2.11.0';
        import Underline from 'https://esm.sh/@tiptap/extension-underline@2.11.0';
        import Link from 'https://esm.sh/@tiptap/extension-link@2.11.0';
        import BulletList from 'https://esm.sh/@tiptap/extension-bullet-list@2.11.0';
        import OrderedList from 'https://esm.sh/@tiptap/extension-ordered-list@2.11.0';
        import ListItem from 'https://esm.sh/@tiptap/extension-list-item@2.11.0';
        import Blockquote from 'https://esm.sh/@tiptap/extension-blockquote@2.11.0';

        document.addEventListener('DOMContentLoaded', function() {
            const editor = new Editor({
                element: document.querySelector('#hs-editor-tiptap [data-hs-editor-field]'),
                editorProps: {
                    attributes: {
                        class: 'relative min-h-40 p-3'
                    }
                },
                extensions: [
                    StarterKit.configure({
                        history: false
                    }),
                    Placeholder.configure({
                        placeholder: 'Dars matnini shu yerga kiriting...',
                        emptyNodeClass: 'before:text-gray-500'
                    }),
                    Paragraph.configure({
                        HTMLAttributes: {
                            class: 'text-inherit text-gray-800'
                        }
                    }),
                    Bold.configure({
                        HTMLAttributes: {
                            class: 'font-bold'
                        }
                    }),
                    Underline,
                    Link.configure({
                        HTMLAttributes: {
                            class: 'inline-flex items-center gap-x-1 text-blue-600 decoration-2 hover:underline focus:outline-none focus:underline font-medium'
                        }
                    }),
                    BulletList.configure({
                        HTMLAttributes: {
                            class: 'list-disc list-inside text-gray-800'
                        }
                    }),
                    OrderedList.configure({
                        HTMLAttributes: {
                            class: 'list-decimal list-inside text-gray-800'
                        }
                    }),
                    ListItem.configure({
                        HTMLAttributes: {
                            class: 'marker:text-sm'
                        }
                    }),
                    Blockquote.configure({
                        HTMLAttributes: {
                            class: 'relative border-s-4 ps-4 sm:ps-6 sm:[&>p]:text-lg'
                        }
                    })
                ],
                content: document.querySelector('#hs-editor-tiptap [data-hs-editor-field]').innerHTML,
                onUpdate: ({
                    editor
                }) => {
                    document.querySelector('#content-hidden').value = editor.getHTML();
                },
            });

            const actions = [{
                    id: '#hs-editor-tiptap [data-hs-editor-bold]',
                    fn: () => editor.chain().focus().toggleBold().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-italic]',
                    fn: () => editor.chain().focus().toggleItalic().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-underline]',
                    fn: () => editor.chain().focus().toggleUnderline().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-strike]',
                    fn: () => editor.chain().focus().toggleStrike().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-link]',
                    fn: () => {
                        const url = window.prompt('Havola URL’sini kiriting:');
                        if (url) editor.chain().focus().extendMarkRange('link').setLink({
                            href: url
                        }).run();
                    }
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-ol]',
                    fn: () => editor.chain().focus().toggleOrderedList().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-ul]',
                    fn: () => editor.chain().focus().toggleBulletList().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-blockquote]',
                    fn: () => editor.chain().focus().toggleBlockquote().run()
                },
                {
                    id: '#hs-editor-tiptap [data-hs-editor-code]',
                    fn: () => editor.chain().focus().toggleCode().run()
                }
            ];

            actions.forEach(({
                id,
                fn
            }) => {
                const action = document.querySelector(id);
                if (action) action.addEventListener('click', fn);
            });

            // Dastlabki qiymatni hidden input’ga o‘rnatish
            document.querySelector('#content-hidden').value = editor.getHTML();
        });
    </script>
@endsection
