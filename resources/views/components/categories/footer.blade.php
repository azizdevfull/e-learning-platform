@foreach ($categories as $category)
    <li><a href="{{ route('courses.index', ['category' => $category->name]) }}"
            class="text-gray-400 hover:text-white">{{ $category->name }}</a></li>
@endforeach
