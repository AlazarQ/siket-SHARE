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
        <!-- Search Form -->
        <form method="GET" action="{{ route('shareholders.index') }}" class="mb-4 text-right">
            <div class="flex space-x-4 justify-end">
                
                <input type="text" name="search_text" value="{{ request()->get('search_text') }}"
                    class="p-2 border rounded" placeholder="Search...">

                    
                <select name="search_column" class="p-2 border rounded">
                    <option value="name" {{ request()->get('search_column') == 'name' ? 'selected' : '' }}>Name
                    </option>
                    <option value="email" {{ request()->get('search_column') == 'email' ? 'selected' : '' }}>Email
                    </option>
                    <option value="country" {{ request()->get('search_column') == 'country' ? 'selected' : '' }}>Country
                    </option>
                    <option value="nationality"
                        {{ request()->get('search_column') == 'nationality' ? 'selected' : '' }}>Nationality</option>
                    <option value="shares" {{ request()->get('search_column') == 'shares' ? 'selected' : '' }}>
                        Subscribed Shares</option>
                    <option value="sharesPaid" {{ request()->get('search_column') == 'sharesPaid' ? 'selected' : '' }}>
                        Paid Shares</option>
                </select>

                <select name="operand" class="p-2 border rounded">
                    <option value=""></option>
                    <option value="like" {{ request()->get('operand') == 'like' ? 'selected' : '' }}>Contains</option>
                    <option value="=" {{ request()->get('operand') == '=' ? 'selected' : '' }}>Equals</option>
                </select>

                <!-- Submit Button -->
                <button type="submit" class="bg-blue-500 px-4 py-2 rounded text-white round">Search</button>
            </div>
        </form>
        <x-bladewind::table :rows="$shareholders" celled="true">

            <x-slot name="header">
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>Nationality</th>
                <th>Subscribed Shares</th>
                <th>Paid Shares</th>
                <th>Documents</th>
                <th>Actions</th>
            </x-slot>
            @foreach ($shareholders as $shareholder)
                <tr>
                    <td>{{ $shareholder->id }}</td>
                    <td>{{ $shareholder->name }}</td>
                    <td>{{ $shareholder->email }}</td>
                    <td>{{ $shareholder->country }}</td>
                    <td>{{ $shareholder->nationality }}</td>
                    <td>{{ $shareholder->shares }}</td>
                    <td>{{ $shareholder->sharesPaid }}</td>
                    <td>
                        @if ($shareholder->shareholder_documents)
                            <a href="{{ asset('storage/shareholder_documents/' . $shareholder->shareholder_documents) }}"
                                alt="Shareholder Document" target="_blank">Download
                                Document</a>
                        @else
                            <p>No document uploaded.</p>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('shareholders.edit', $shareholder->id) }}"
                            class="px-4 py-2 rounded">Edit</a>
                        {{-- <form action="{{ route('shareholders.edit', $shareholders->id) }}" method="PUT"> --}}
                        {{-- <x-bladewind::button href="{{ route('shareholders.edit', $shareholder->id) }}"
                                class="bg-blue-500" can_submit="true">Edit</x-bladewind::button> --}}
                        {{-- </form> --}}
                        <form action="{{ route('shareholders.destroy', $shareholder->id) }}" method="POST"
                            class="delete-customer" can_submit="true">
                            @csrf
                            @method('DELETE')
                            <x-bladewind::button type="submit" class="px-4 py-2 rounded"
                                can_submit="true">Delete</x-bladewind::button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </x-bladewind::table>
        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $shareholders->links() }}
        </div>
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
