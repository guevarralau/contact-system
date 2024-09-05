<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contacts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto py-10">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Contacts List</h1>

            <!-- Button to open the Create Contact page -->
            <a href="{{ route('contacts.create') }}" class="mb-4 my-5 px-4 py-2  bg-green-500 text-white font-semibold rounded-lg hover:bg-green-600">
                Create Contact
            </a>

            <!-- Search Form -->
            <form method="GET" action="{{ route('contacts.index') }}" class="mb-6 flex">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search contacts"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 mt-5"
                >
                <button
                    type="submit"
                    class="ml-3 px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                    Search
                </button>
            </form>

            <!-- Contact List -->
            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <ul class="divide-y divide-gray-200">
                    @forelse($contacts as $contact)
                        <li class="p-4 flex justify-between items-center">
                            <div class="text-lg font-medium">
                                {{ $contact->name }} - {{ $contact->email }} - {{ $contact->phone }} - {{ $contact->company }}
                            </div>
                            <div class="flex space-x-3">
                                <!-- Button to open the Edit Contact page -->
                                <a href="{{ route('contacts.edit', $contact->id) }}" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="p-4 text-center text-gray-500">
                            No contacts found.
                        </li>
                    @endforelse
                </ul>
            </div>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $contacts->appends(['search' => request('search')])->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
