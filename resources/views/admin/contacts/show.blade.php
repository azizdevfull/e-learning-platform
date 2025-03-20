@extends('layouts.admin')

@section('title', $contact->name)

@section('content')
    <div class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h1 class="text-3xl font-bold text-gray-900">{{ $contact->name }}</h1>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
            <p class="text-gray-600"><strong>Email:</strong> {{ $contact->email }}</p>
            <p class="text-gray-600"><strong>Mavzu:</strong> {{ $contact->subject }}</p>
            <p class="text-gray-600"><strong>Xabar:</strong> {{ $contact->message }}</p>
            <p class="text-gray-600"><strong>Yuborilgan:</strong> {{ $contact->created_at->format('d.m.Y H:i') }}</p>
            <form action="{{ route('admin.contacts.update', $contact) }}" method="POST" class="mt-4">
                @csrf
                @method('PUT')
                <div class="space-y-2">
                    <label for="status" class="block text-sm font-medium text-gray-700">Holati</label>
                    <select name="status" id="status"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring-primary sm:text-sm">
                        <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>Kutilmoqda</option>
                        <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>O‘qildi</option>
                        <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>Javob berildi</option>
                    </select>
                    @error('status')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="mt-4 px-4 py-2 bg-primary text-white rounded-md hover:bg-primary-hover">
                    Yangilash
                </button>
            </form>
        </div>
    </div>
@endsection
