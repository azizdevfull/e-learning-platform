@foreach ($categories as $category)
    <a href="#{{ $category->name }}" class="block px-3 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-md"
        data-category="{{ $category->name }}">{{ $category->name }}</a>
@endforeach
