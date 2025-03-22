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

                            <!-- Lesson Content with CKEditor -->
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">Dars matni</label>
                                <textarea id="content" name="content"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-primary focus:border-primary sm:text-sm @error('content') border-red-500 @enderror"
                                    rows="5">{{ old('content', $lesson->content) }}</textarea>
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

@section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: [
                    'heading', '|',
                    'bold', 'italic', 'underline', '|',
                    'numberedList', 'bulletedList', '|',
                    'link', 'insertTable', 'blockQuote', '|',
                    'outdent', 'indent', '|',
                    'undo', 'redo'
                ],
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraf',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Sarlavha 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Sarlavha 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Sarlavha 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Sarlavha 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Sarlavha 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Sarlavha 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                },
                link: {
                    addTargetToExternalLinks: true,
                    defaultProtocol: 'https://',
                    decorators: {
                        toggleDownloadable: {
                            mode: 'manual',
                            label: 'Yuklab olinadigan',
                            attributes: {
                                download: 'file'
                            }
                        }
                    }
                },
                table: {
                    contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells', 'tableProperties',
                        'tableCellProperties'
                    ]
                },
                placeholder: 'Dars matnini shu yerga kiriting!',
                language: 'uz',
            })
            .then(editor => {
                console.log('Editor muvaffaqiyatli ishga tushdi', editor);
                // CKEditor yuklanganda required atributini olib tashlash
                document.querySelector('#content').removeAttribute('required');
            })
            .catch(error => {
                console.error('Xatolik yuz berdi:', error);
            });
    </script>
@endsection
