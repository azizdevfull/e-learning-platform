<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- resources/views/auth/register.blade.php -->
        <div class="mt-4">
            <label for="name">Ism</label>
            <input id="name" class="block mt-1 w-full" type="text" name="name" required autofocus />

            <label for="email" class="mt-4">Email</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" required />

            <label for="password" class="mt-4">Parol</label>
            <input id="password" class="block mt-1 w-full" type="password" name="password" required />

            <label for="password_confirmation" class="mt-4">Parolni tasdiqlash</label>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation"
                required />

            <button class="mt-4">Ro'yxatdan o'tish</button>
        </div>

    </form>
</x-guest-layout>
