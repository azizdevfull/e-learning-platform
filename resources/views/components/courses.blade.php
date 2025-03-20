<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Mashhur kurslar</h2>
        <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Eng ko'p o'qiladigan va yuqori baholangan
            kurslarimiz bilan tanishing.</p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
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
                        <a href="{{ route('courses.show', $course->id) }}"
                            class="text-primary hover:text-primary-hover font-medium text-sm">Batafsil</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>

    <div class="text-center mt-12">
        <a href="{{ route('courses.index') }}"
            class="inline-flex items-center justify-center rounded-md bg-primary px-6 py-3 text-base font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
            Barcha kurslarni ko'rish
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
</div>
