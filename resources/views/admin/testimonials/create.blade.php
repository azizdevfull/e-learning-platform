@extends('layouts.admin')

@section('title', 'Yangi fikr qo‘shish')

@section('content')
    <div class="p-6 space-y-6">
        <h1 class="text-3xl font-bold text-gray-900">Yangi fikr qo‘shish</h1>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Ism</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            placeholder="Ismni kiriting" required>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="course" class="block text-sm font-medium text-gray-700">Kurs</label>
                        <input type="text" name="course" id="course" value="{{ old('course') }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            placeholder="Kurs nomini kiriting" required>
                        @error('course')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="comment" class="block text-sm font-medium text-gray-700">Fikr</label>
                        <textarea name="comment" id="comment" rows="4"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            placeholder="Fikrni kiriting" required>{{ old('comment') }}</textarea>
                        @error('comment')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="rating" class="block text-sm font-medium text-gray-700">Reyting (1-5)</label>
                        <input type="number" name="rating" id="rating" value="{{ old('rating', 5) }}"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm"
                            min="1" max="5" required>
                        @error('rating')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700">Rasm (ixtiyoriy)</label>
                        <input type="file" name="image" id="image"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-primary file:text-white hover:file:bg-primary-hover">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.testimonials.index') }}"
                            class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                            Bekor qilish
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-primary text-white rounded-md text-sm font-medium hover:bg-primary-hover">
                            Saqlash
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
