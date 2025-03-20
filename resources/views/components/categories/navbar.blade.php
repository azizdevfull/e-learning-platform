@foreach ($categories as $category)
    <a href="#{{ $category->slug }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md"
        data-category="{{ $category->slug }}">{{ $category->name }}</a>
@endforeach
