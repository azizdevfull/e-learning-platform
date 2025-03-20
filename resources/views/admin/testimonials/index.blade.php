@extends('layouts.admin')

@section('title', 'Fikrlar')

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">Fikrlar</h1>
            <a href="{{ route('admin.testimonials.create') }}"
                class="px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover transition-colors">
                Yangi fikr qo‘shish
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

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ism
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kurs
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Reyting</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amallar</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($testimonials as $testimonial)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    <a href="{{ route('admin.testimonials.show', $testimonial) }}"
                                        class="text-primary hover:underline">{{ $testimonial->name }}</a>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $testimonial->course }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $testimonial->rating }}/5
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('admin.testimonials.edit', $testimonial) }}"
                                        class="text-primary hover:text-primary-hover mr-4">Tahrirlash</a>
                                    <form action="{{ route('admin.testimonials.destroy', $testimonial) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Bu fikrni o‘chirishni xohlaysizmi?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800">O‘chirish</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-4 text-center text-sm text-gray-600">Hozircha fikrlar
                                    mavjud emas.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $testimonials->links() }}
            </div>
        </div>
    </div>
@endsection
