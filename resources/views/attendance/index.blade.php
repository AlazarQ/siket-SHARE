<x-app-layout>
    <x-slot name="header"></x-slot>
    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <x-bladewind::notification />
        <x-bladewind::card>
            <form method="POST" action="{{ route('attendance.store') }}" class="attendance-setting-form">
                <h1 class="my-2 text-2xl font-light text-blue-900/80">Attendance Settings (Parameter)</h1>
                @csrf
                <x-bladewind::input name="shortCode" required="true" label="Parameter Code" />
                <x-bladewind::input name="paramType" required="true" label="Parameter Type" />
                <x-bladewind::input name="paramValue" required="true" label="Parameter Value" />

                <div class="flex gap-4">

                    <x-bladewind::input name="reserved1" required="true" label="Reserved 1" />

                    <x-bladewind::input name="reserved2" label="Reserved 1" />

                </div>
                <div class="text-right">
                    <x-bladewind::button class="mt-4" can_submit="true">{{ __('Save') }}</x-bladewind::button>
                </div>
            </form>
        </x-bladewind::card>
    </div>
</x-app-layout>
<script>
    document.querySelector('.attendance-setting-form').addEventListener('submit', function(e) {
        e.preventDefault(); 
        if (validateForm('.attendance-setting-form')) {
            this.submit(); // Submit the form after validation
        }
    });
</script>
