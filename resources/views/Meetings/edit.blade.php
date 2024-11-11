<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Edit Meeting Settings') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::notification />
        <x-bladewind::card>
            <form action="{{ route('meetings.update', $meeting->id) }}" method="POST" class="edit-meeting-form">
                @csrf
                @method('PUT')
                <x-bladewind::input name="meeting_date" required="true" label="Meeting Date"
                    value="{{ old('name', $meeting->meeting_date) }}" error_message="Please enter Meeting Date"
                    type="date" />

                @php
                    $status = [['label' => 'Open', 'value' => 'open'], ['label' => 'Closed', 'value' => 'closed']];
                @endphp
                <x-bladewind::select name="status" required="true" :data="$status" label="Meeting Status" value="{{ old('name', $meeting->status) }}"/>

                <div class="text-right">
                    <x-bladewind::button id="submit-btn" has_spinner="true" type="primary" can_submit="true"
                        class="mt-3">
                        Save
                    </x-bladewind::button>
                </div>
            </form>
        </x-bladewind::card>
    </div>
</x-app-layout>
<script>
    document.querySelector('.edit-meeting-form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm('.edit-meeting-form')) {
            this.submit();
        }
    });
</script>