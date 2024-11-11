<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Shareholders List (Attendance)') }}
            </h2>
            {{-- <a href="{{ route('shareholders.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Shareholder</a> --}}
        </div>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::table :rows="$shareholders" divider="thin">

            <x-slot name="header">
                <th>Name</th>
                <th>Email</th>
                <th>No of Shares</th>
                <th>Actions</th>
            </x-slot>
            @foreach ($shareholders as $shareholder)
                <tr>
                    <td name="shareholder_id">{{ $shareholder->email }}</td>
                    <td name="shareholder_email">{{ $shareholder->email }}</td>
                    <td name="shares">{{ $shareholder->shares }}</td>
                    <td>
                        <form action="{{ route('attendances.store', $shareholder->id) }}" method="POST"
                            class="attend-customer" can_submit="true">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="shareholder_id" value="{{ $shareholder->id }}">
                            <x-bladewind::button type="submit" class="bg-green-500"
                                can_submit="true">Attend</x-bladewind::button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-bladewind::table>
    </div>
</x-app-layout>
<script>
    document.querySelector('.attend-customer').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm('.attend-customer')) {
            this.submit();
        }
    });
</script>
