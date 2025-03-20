@extends('layouts.admin')

@section('title', $course->title)

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $course->title }}</h1>
            <a href="{{ route('admin.courses.edit', $course) }}"
                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors">
                Tahrirlash
            </a>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
                {{ session('error') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Kurs haqida</h2>
                <p class="text-gray-600">{{ $course->description ?? 'Tavsif mavjud emas.' }}</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-600">Kategoriya: <span
                            class="font-medium">{{ $course->category->name }}</span></p>
                    <p class="text-sm text-gray-600">O‘qituvchi: <span
                            class="font-medium">{{ $course->teacher->name }}</span></p>
                </div>
                <div>
                    @if ($course->image)
                        <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}"
                            class="w-32 h-32 object-cover rounded-md">
                    @else
                        <p class="text-sm text-gray-600">Rasm yuklanmagan.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-900 mb-4">Kursdagi talabalar</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ism
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                            </th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amallar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($students as $student)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    {{ $student->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $student->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <form action="{{ route('admin.courses.remove-student', [$course, $student]) }}"
                                        method="POST"
                                        onsubmit="return confirm('Bu talabani kursdan chiqarib yubormoqchimisiz?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">Chiqarib
                                            yuborish</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="px-6 py-4 text-center text-sm text-gray-600">Hozircha talabalar
                                    mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $students->links() }}
            </div>
        </div>
    </div>
@endsection
