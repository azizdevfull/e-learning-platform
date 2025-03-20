@foreach ($categories as $category)
    <a href="{{ route('courses.index', ['category' => $category->name]) }}"
        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md"
        data-category="{{ $category->slug }}">{{ $category->name }}</a>
@endforeach
