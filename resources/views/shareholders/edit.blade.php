<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Edit Shareholder') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form method="POST" action="{{ route('shareholders.update', $shareholder->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ $shareholder->name }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ $shareholder->email }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <div class="mb-4">
                <label for="shares" class="block text-sm font-medium text-gray-700">Shares</label>
                <input type="number" name="shares" id="shares" value="{{ $shareholder->shares }}" class="mt-1 block w-full border-gray-300 rounded-md" required>
            </div>

            <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-md">Update Shareholder</button>
        </form>
    </div>
</x-app-layout>
