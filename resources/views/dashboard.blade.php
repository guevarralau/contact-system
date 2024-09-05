<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
    @if (session('registered'))
        <div class="bg-slate-400 px-5 py-8">
            <div class="flex flex-col items-center space-y-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-28 w-28 text-green-600" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <h1 class="text-4xl font-bold">Thank You !</h1>
                <p>Thank you for your registering!.</p>
                <a
                    href="{{route('contacts.index')}}"
                    class="inline-flex items-center rounded border border-indigo-600 bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 focus:outline-none focus:ring">
                    <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-3 w-3" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                    </svg>
                    <span class="text-sm font-medium"> Continue </span>
                </a>
            </div>
        </div>
    @endif
        
    </div>
</x-app-layout>
