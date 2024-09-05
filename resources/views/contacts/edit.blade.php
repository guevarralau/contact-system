<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Contact') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto py-10">
            <h1 class="text-3xl font-bold mb-6 text-white">Edit Contact</h1>

            <form method="POST" action="{{ route('contacts.update', $contact->id) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700">Name</label>
                    <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg" value="{{ old('name', $contact->name) }}">
                    @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg" value="{{ old('email', $contact->email) }}">
                    @error('email') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Phone</label>
                    <input type="text" name="phone" class="w-full px-4 py-2 border rounded-lg" value="{{ old('phone', $contact->phone) }}">
                    @error('phone') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Company</label>
                    <input type="text" name="company" class="w-full px-4 py-2 border rounded-lg" value="{{ old('company', $contact->company) }}">
                    @error('company') <span class="text-red-500">{{ $message }}</span> @enderror
                </div>
                <div class="flex justify-end">
                    <a href="{{ route('contacts.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded-lg mr-3">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
