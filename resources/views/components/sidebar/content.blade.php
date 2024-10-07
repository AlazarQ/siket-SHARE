<x-perfect-scrollbar
    as="nav"
    aria-label="main"
    class="flex flex-col flex-1 gap-4 px-3"
>

    <x-sidebar.link
        title="Dashboard"
        href="{{ route('dashboard') }}"
        :isActive="request()->routeIs('dashboard')"
    >
        <x-slot name="icon">
            <x-icons.dashboard class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.dropdown
        title="Customers"
        :active="Str::startsWith(request()->route()->uri(), 'customers')"
    >
        <x-slot name="icon">
            <x-icons.customer class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Add Customers"
            href="{{ route('customers.create')}}"
            :active="request()->routeIs('customers.create')"
        />

        <x-sidebar.sublink
            title="Manage Customers"
            href="{{ route('customers.index') }}"
            :active="request()->routeIs('customers.index')"
        />

        {{-- <x-sidebar.sublink
            title="List Customers"
            href="{{ route('customers.index') }}"
            :active="request()->routeIs('customers.index')"
        /> --}}
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="FCY Requests"
        :active="Str::startsWith(request()->route()->uri(), 'customerRequest')"
    >
        <x-slot name="icon">
            <x-icons.currency class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="New Request (FCY)"
            href=" {{ route('customerRequest.create')}}"
            :active="request()->routeIs('customerRequest.create')"
        />
        <x-sidebar.sublink
            title="Manage Requests"
            href="{{ route('customerRequest.index')}}"
            :active="request()->routeIs('customerRequest.index')"
        />
        {{-- <x-sidebar.sublink
            title="List Requests"
            href="#"
            :active="request()->routeIs('buttons.text-icon')"
        /> --}}
    </x-sidebar.dropdown>

    <x-sidebar.link
        title="Reports"
        href="#"
        {{-- :active="request()->routeIs('dashboard')" --}}
    >
        <x-slot name="icon">
            <x-icons.archive class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>
    </x-sidebar.link>

</x-perfect-scrollbar>
