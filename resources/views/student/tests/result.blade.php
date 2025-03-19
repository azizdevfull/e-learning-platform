@extends('layouts.student')

@section('title', 'Test Natijasi: ' . $test->title)

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="space-y-6">
                <!-- Header -->
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <h2 class="text-3xl font-bold tracking-tight">Test Natijasi: {{ $test->title }}</h2>
                        <p class="text-gray-500">Sizning testdagi yutuqlaringiz</p>
                    </div>
                    <a href="{{ route('student.tests.index') }}"
                        class="inline-flex items-center justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-medium text-white hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Testlarga qaytish
                    </a>
                </div>

                <!-- Result Content -->
                <div class="rounded-lg border bg-white shadow-sm p-6">
                    @if ($latestResult)
                        <div class="mb-4">
                            <h3 class="text-lg font-semibold text-gray-900">Oxirgi ball</h3>
                            <p class="text-2xl font-bold text-primary">{{ round($latestResult->score) }}%</p>
                        </div>
                    @endif

                    <div>
                        <h3 class="text-lg font-semibold text-gray-900">Umumiy natija</h3>
                        <p class="text-2xl font-bold text-primary">{{ round($score) }}%</p>
                    </div>

                    <div class="mt-6 flex justify-between items-center">
                        <a href="{{ route('student.dashboard') }}"
                            class="inline-flex items-center justify-center rounded-md bg-primary px-4 py-2 text-sm font-medium text-white hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            Dashboardga qaytish
                        </a>
                        <a href="{{ route('student.tests.show', $test->id) }}"
                            class="inline-flex items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2">
                            Testni qayta yechish
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
