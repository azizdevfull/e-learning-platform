@extends('layouts.guest')

@section('title', 'Ro‘yxatdan o‘tish')

@section('content')
    <main class="flex-grow flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h2 class="mt-6 text-3xl font-extrabold text-gray-900">
                    Yangi hisob yarating
                </h2>
                <p class="mt-2 text-sm text-gray-600">
                    Yoki
                    <a href="{{ route('login') }}" class="font-medium text-primary hover:text-primary-hover">
                        mavjud hisobingizga kiring
                    </a>
                </p>
            </div>

            <div class="mt-8 bg-white py-8 px-4 shadow-md rounded-lg sm:px-10">
                <form class="space-y-6" id="register-form" action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Full Name Input -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Ism</label>
                        <div class="mt-1">
                            <input id="name" name="name" type="text" autocomplete="given-name" required
                                value="{{ old('name') }}"
                                class="appearance-none block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm 
                                @error('name') border-red-500 @else border-gray-300 @enderror"
                                placeholder="Ismingizni kiriting">
                        </div>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email manzil</label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                value="{{ old('email') }}"
                                class="appearance-none block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm 
                                @error('email') border-red-500 @else border-gray-300 @enderror"
                                placeholder="sizning@email.com">
                        </div>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Parol</label>
                        <div class="mt-1">
                            <input id="password" name="password" type="password" autocomplete="new-password" required
                                class="appearance-none block w-full px-3 py-2 border rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm 
                                @error('password') border-red-500 @else border-gray-300 @enderror"
                                placeholder="••••••••">
                        </div>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm Password Input -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Parolni
                            tasdiqlang</label>
                        <div class="mt-1">
                            <input id="password_confirmation" name="password_confirmation" type="password"
                                autocomplete="new-password" required
                                class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <!-- Terms and Conditions -->
                    <div class="flex items-center">
                        <input id="terms" name="terms" type="checkbox" required
                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                        <label for="terms" class="ml-2 block text-sm text-gray-900">
                            Men <a href="#" class="text-primary hover:text-primary-hover">foydalanish shartlari</a> va
                            <a href="#" class="text-primary hover:text-primary-hover">maxfiylik siyosati</a> bilan
                            tanishdim va roziman
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary">
                            Ro'yxatdan o'tish
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </main>
@endsection
