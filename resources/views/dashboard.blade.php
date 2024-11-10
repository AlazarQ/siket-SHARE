<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <a href="{{ route('shareholders.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Shareholder</a>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <h3 class="font-semibold text-xl mb-4">List of Shareholders</h3>
        <table class="min-w-full table-auto">
            <thead>
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Email</th>
                    <th class="px-4 py-2">Shares</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach ($shareholders as $shareholder)
                    <tr>
                        <td class="px-4 py-2">{{ $shareholder->name }}</td>
                        <td class="px-4 py-2">{{ $shareholder->email }}</td>
                        <td class="px-4 py-2">{{ $shareholder->shares }}</td>
                        <td class="px-4 py-2">
                            <a href="{{ route('shareholders.edit', $shareholder->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-md">Edit</a>
                            <form action="{{ route('shareholders.destroy', $shareholder->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</x-app-layout>

