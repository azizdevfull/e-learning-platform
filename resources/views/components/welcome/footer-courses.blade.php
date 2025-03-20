@foreach ($topCourses as $course)
    <li class="text-gray-400 hover:text-white">
        <a href="{{ route('courses.show', $course) }}" class="text-gray-400 hover:text-white">
            {{ $course->title }}
        </a>
        <span class="text-blue-500 hover:text-white">
            {{ $course->students_count }} o‘quvchi
        </span>
    </li>
@endforeach
