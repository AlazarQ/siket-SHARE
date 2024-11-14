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
            <x-icons.shareholders class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Register Shareholder"
            href="{{ route('shareholders.create')}}"
            :active="request()->routeIs('shareholders.create')"
        />

        <x-sidebar.sublink
            title="Manage Shareholder"
            href="{{ route('shareholders.index') }}"
            :active="request()->routeIs('shareholders.index')"
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
            <x-icons.attendance class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Attendance"
            href=" {{ route('attendances.create')}}"
            :active="request()->routeIs('attendances.create')"
        />
        
        <x-sidebar.sublink
        title="Attendance Status"
        href="{{ route('attendances.stats')}}"
        :active="request()->routeIs('attendances.stats')"
        />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Meeting"
        :active="Str::startsWith(request()->route()->uri(), 'meetings')"
    >
        <x-slot name="icon">
            <x-icons.meeting class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Manage Meetings"
            href=" {{ route('meetings.index')}}"
            :active="request()->routeIs('meetings.index')"
        />
    </x-sidebar.dropdown>

    <x-sidebar.dropdown
        title="Settings"
        {{-- :active="Str::startsWith(request()->route()->uri(), 'meetings')" --}}
    >
        <x-slot name="icon">
            <x-icons.cogs class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
        </x-slot>

        <x-sidebar.sublink
            title="Shareholder"
            {{-- href=" {{ route('meetings.index')}}"
            :active="request()->routeIs('meetings.index')" --}}
        />

        <x-sidebar.sublink
            title="Attendance"
            {{-- href=" {{ route('meetings.index')}}"
            :active="request()->routeIs('meetings.index')" --}}
        />

        <x-sidebar.sublink
            title="Meeting"
            {{-- href=" {{ route('meetings.index')}}"
            :active="request()->routeIs('meetings.index')" --}}
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
