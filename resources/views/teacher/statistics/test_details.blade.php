@extends('layouts.teacher')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Test Sarlavhasi -->
        <div class="mb-8">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-900">{{ $test->title }} testi bo‘yicha natijalar</h2>
            <p class="mt-2 text-gray-600">Jami natijalar soni: <span
                    class="font-medium text-primary">{{ $results->count() }}</span></p>
        </div>

        <!-- Natijalar Jadvali -->
        @if ($results->isEmpty())
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <p class="text-gray-600">Hali hech kim bu testni topshirmagan.</p>
            </div>
        @else
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Talaba</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Ballar</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Topshirilgan sana</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($results as $result)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <img src="{{ $result->student->profile_photo_url ?? 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&auto=format&fit=crop&w=40&h=40&q=80' }}"
                                                alt="{{ $result->student->name }}" class="h-10 w-10 rounded-full mr-3">
                                            <span
                                                class="text-sm font-medium text-gray-900">{{ $result->student->name }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $result->student->email }}</td>
                                    <td
                                        class="px-6 py-4 whitespace-nowrap text-sm font-medium {{ $result->score >= 70 ? 'text-green-600' : 'text-red-600' }}">
                                        {{ $result->score }}%
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                        {{ $result->created_at->format('d.m.Y H:i') }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif

        <!-- Orqaga qaytish tugmasi -->
        <div class="mt-6">
            <a href="{{ route('teacher.statistics.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-700 rounded-md hover:bg-gray-300 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
                Orqaga qaytish
            </a>
        </div>
    </div>
@endsection
