<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Shareholders List (Attendance)') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <!-- Display success or error messages -->
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger mb-4">
                {{ session('error') }}
            </div>
        @endif

        <x-bladewind::table :rows="$shareholders" divider="thin">
            <x-slot name="header">
                <th>Name</th>
                <th>Email</th>
                <th>No of Shares</th>
                <th>Actions</th>
            </x-slot>

            @foreach ($shareholders as $shareholder)
                <tr>
                    <td>{{ $shareholder->name }}</td>
                    <td>{{ $shareholder->email }}</td>
                    <td>{{ $shareholder->shares }}</td>
                    <td>
                        <form action="{{ route('attendances.store', $shareholder->id) }}" method="POST">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="shareholder_id" value="{{ $shareholder->id }}">
                            <x-bladewind::button type="submit" class="bg-green-500">Attend</x-bladewind::button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-bladewind::table>
    </div>
</x-app-layout>
