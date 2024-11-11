<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Record Attendance for Meeting') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <form action="{{ route('meetings.recordAttendance', $meeting->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Select Shareholders for Attendance:</label>
                <div class="shareholders-list">
                    @foreach($shareholders as $shareholder)
                        <label>
                            <input type="checkbox" name="attendees[]" value="{{ $shareholder->id }}">
                            {{ $shareholder->name }}
                        </label><br>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Record Attendance</button>
        </form>
    </div>
</x-app-layout>
