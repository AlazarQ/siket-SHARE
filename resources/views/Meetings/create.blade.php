<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::notification />
        <x-bladewind::card>
            <form id="meeting-form" method="POST" action="{{ route('meetings.store') }}" class="add-meeting-form"
                enctype="multipart/form-data">
                @csrf

                <h1 class="my-2 text-2xl font-light text-blue-900/80">Create New Meeting</h1>

                <x-bladewind::input name="meeting_date" required="true" label="Meeting Date"
                     error_message="Please enter Meeting Date"
                    type="date" />

                @php
                    $status = [['label' => 'Open', 'value' => 'open'], ['label' => 'Closed', 'value' => 'closed']];
                @endphp
                <x-bladewind::select name="labels" required="true" :data="$status" label="Meeting Status" />

                <div class="text-right">
                    <x-bladewind::button id="submit-btn" has_spinner="true" type="primary" can_submit="true"
                        class="mt-3">
                        Save Meeting
                    </x-bladewind::button>
                </div>

            </form>
        </x-bladewind::card>
    </div>
</x-app-layout>
<script>
    document.querySelector('.add-meeting-form').addEventListener('submit', function(e) {
        e.preventDefault();
        if (validateForm('.add-meeting-form')) {
            this.submit();
        }
    });
</script>
