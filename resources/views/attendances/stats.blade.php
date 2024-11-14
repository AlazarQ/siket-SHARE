<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Attendance Stats') }}
            </h2>
        </div>
    </x-slot>

    <!-- Display Current Date and Time in Bold -->
    <div class="p-6 bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <p class="font-bold text-lg">
            Current Date and Time: {{ $currentDateTime }}
        </p>
        <br>

        <!-- Display Meeting Date -->
        <p class="font-semibold">
            Meeting Date: {{ $meeting->meeting_date }}
        </p>

        <!-- Display Number of Attendees -->
        <p class="font-semibold">
            Total Attendees: {{ $attendeesCount }}
        </p>

        <!-- Display Chart -->
        {{-- <canvas id="attendanceChart" width="100" height="50"></canvas> --}}

        <!-- Add your chart.js script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('attendanceChart').getContext('2d');
            const attendanceChart = new Chart(ctx, {
                type: 'pie', // You can choose different chart types like 'line', 'pie', etc.
                data: {
                    labels: ['Attendees'], // Label for the x-axis (or categories)
                    datasets: [{
                        label: 'Total Attendees',
                        data: [{{ $attendeesCount }}], // Pass the attendees count dynamically
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</x-app-layout>
