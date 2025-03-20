@extends('layouts.student')

@section('title', 'Profil')

@section('content')
    <main class="pt-16 md:pl-64">
        <div class="p-4 md:p-6">
            <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
                <h2 class="text-2xl font-semibold mb-4">Profilim</h2>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('student.profile.update') }}" method="POST">
                    @csrf

                    <!-- Name -->
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Ismingiz</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $student->name) }}"
                            class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-primary">
                        @error('name')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email', $student->email) }}"
                            class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-primary">
                        @error('email')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium mb-2">Yangi parol (ixtiyoriy)</label>
                        <input type="password" id="password" name="password"
                            class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-primary">
                        @error('password')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Confirmation -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">Parolni
                            tasdiqlang</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="w-full p-2 border rounded-lg focus:outline-none focus:ring focus:ring-primary">
                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-hover">
                        Profilni yangilash
                    </button>
                </form>
            </div>
        </div>
    </main>
@endsection