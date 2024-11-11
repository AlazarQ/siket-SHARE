<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            {{-- <a href="{{ route('shareholders.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Shareholder</a> --}}
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        
    </div>
</x-app-layout>

