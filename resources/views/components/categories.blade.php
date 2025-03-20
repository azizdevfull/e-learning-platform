<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-900">Kategoriyalar</h2>
        <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">Qiziqishlaringizga mos kurslarni toping va
            o'rganishni boshlang.</p>
    </div>
    <div class="flex flex-wrap justify-center gap-4">
        @foreach ($categories as $category)

            <a href="#"
                class="category-pill px-6 py-3 bg-primary-light text-primary font-medium rounded-full hover:bg-primary hover:text-white"
                data-category="{{ $category->name }}">{{ $category->name }}</a>
        @endforeach

    </div>
</div>