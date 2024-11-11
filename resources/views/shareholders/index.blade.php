<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Shareholders List') }}
            </h2>
            {{-- <a href="{{ route('shareholders.create') }}" class="bg-green-500 text-white px-4 py-2 rounded-md">Add Shareholder</a> --}}
        </div>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::table :rows="$shareholders" celled="true">

            <x-slot name="header">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Nationality</th>
                <th>No of Shares</th>
                <th>Documents</th>
                <th>Actions</th>
            </x-slot>
            @foreach ($shareholders as $shareholder)
                <tr>
                    <td>{{ $shareholder->id }}</td>
                    <td>{{ $shareholder->name }}</td>
                    <td>{{ $shareholder->email }}</td>
                    <td>ET</td>
                    <td>ET</td>
                    <td>200.23</td>
                    <td>
                        @if ($shareholder->document)
                            <a href="{{ asset('storage/' . $shareholder->document) }}" target="_blank">Download
                                Document</a>
                        @else
                            <p>No document uploaded.</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('shareholders.edit', $shareholder->id) }}" class="bg-blue-500 px-4 py-2 rounded">Edit</a>
                        {{-- <form action="{{ route('shareholders.edit', $shareholders->id) }}" method="PUT"> --}}
                            {{-- <x-bladewind::button href="{{ route('shareholders.edit', $shareholder->id) }}"
                                class="bg-blue-500" can_submit="true">Edit</x-bladewind::button> --}}
                        {{-- </form> --}}
                        <form action="{{ route('shareholders.destroy', $shareholder->id) }}" method="POST"
                            class="delete-customer" can_submit="true">
                            @csrf
                            @method('DELETE')
                            <x-bladewind::button type="submit" class="bg-red-500"
                                can_submit="true">Delete</x-bladewind::button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-bladewind::table>
    </div>
</x-app-layout>
<script>
    document.querySelector('.delete-customer').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm('.delete-customer')) {
            this.submit();
        }
    });
</script>
