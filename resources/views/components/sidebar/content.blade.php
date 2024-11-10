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
        title="Shareholders"
        :active="Str::startsWith(request()->route()->uri(), 'shareholders')"
    >
        <x-slot name="icon">
            <x-icons.customer class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Register Shareholder"
            href="{{ route('shareholders.create')}}"
            :active="request()->routeIs('shareholders.create')"
        />

        <x-sidebar.sublink
            title="Manage Shareholder"
            {{-- href="{{ route('shareholders.index') }}"
            :active="request()->routeIs('shareholders.index')" --}}
        />

        <x-sidebar.sublink
            title="List shareholders"
            {{-- href="{{ route('shareholders.index') }}"
            :active="request()->routeIs('shareholders.index')" --}}
        />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Attendance"
        :active="Str::startsWith(request()->route()->uri(), 'attendance')"
    >
        <x-slot name="icon">
            <x-icons.currency class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Attendance Settings"
            href=" {{ route('attendance.index')}}"
            :active="request()->routeIs('attendance.index')"
        />
        <x-sidebar.sublink
            title="Attendance Link 1"
            {{-- href="{{ route('customerRequest.index')}}"
            :active="request()->routeIs('customerRequest.index')" --}}
        />

        <x-sidebar.sublink
            title="Attendance Link 2"
            {{-- href="{{ route('customerRequest.index')}}"
            :active="request()->routeIs('customerRequest.index')" --}}
        />
        <x-sidebar.sublink
        title="Attendance Link 3"
        {{-- href="{{ route('customerRequest.index')}}"
        :active="request()->routeIs('customerRequest.index')" --}}
        />
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
