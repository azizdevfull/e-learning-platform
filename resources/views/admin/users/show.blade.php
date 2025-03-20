@extends('layouts.admin')

@section('title', $user->name)

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $user->name }}</h1>
            <a href="{{ route('admin.users.edit', $user) }}"
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
                <p class="text-sm text-gray-600">Email: <span class="font-medium">{{ $user->email }}</span></p>
                <p class="text-sm text-gray-600">Rol: <span class="font-medium">{{ $user->role->name }}</span></p>
                <p class="text-sm text-gray-600">Yaratilgan: <span
                        class="font-medium">{{ $user->created_at->format('d.m.Y H:i') }}</span></p>
            </div>
        </div>
    </div>
@endsection
