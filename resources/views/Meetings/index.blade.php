<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Meetings') }}
            </h2>
            {{-- <a href="{{ route('shareholders.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Shareholder</a> --}}
        </div>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::table :rows="$meetings">

            <x-slot name="header">
                <th>Meeting Date</th>
                <th>Status</th>
                <th>Actions</th>
            </x-slot>
            @foreach ($meetings as $meeting)
                <tr>
                    <td>{{ $meeting->meeting_date }}</td>
                    <td>{{ ucfirst($meeting->status) }}</td>
                    <td>
                        <form action="{{ route('meetings.edit', $meeting->id) }}" method="PUT">
                            @csrf  <!-- CSRF Token for security -->
                            <button type="submit" class="bg-blue-500 inline-block px-4 py-2 rounded text-white">
                                Edit Meeting Data
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-bladewind::table>
    </div>
</x-app-layout>

