@foreach ($categories as $category)
    <li><a href="#{{ $category->slug }}" class="text-gray-400 hover:text-white">{{ $category->name }}</a></li>
@endforeach
