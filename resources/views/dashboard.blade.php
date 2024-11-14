<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
            <div class="p-4 rounded shadow text-center">
                <x-icons.shareholders class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <h4>Shareholders</h4>
                <p class="text-2xl">{{ $shareholders }}</p>
            </div>
            <div class="p-4 rounded shadow text-center">
                <x-icons.subscribedShare class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <h4>Subscribed</h4>
                <p class="text-2xl">{{ $subscribedTotal }}</p>
            </div>
            <div class="p-4 rounded shadow text-center">
                <x-icons.paidShare class="flex-shrink-0 w-6 h-6" aria-hidden="true" />
                <h4>Paid</h4>
                <p class="text-2xl">{{ $paidTotal }}</p>
            </div>
            
        </div><br>
        {{-- <h3 class="text-lg font-semibold mb-4">{{ __('Branches per District') }}</h3>
        <div class="p-4 rounded shadow text-left">
            <canvas id="branchesPerDistrictChart" width="100" height="50"></canvas>
        </div> --}}
        
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Prepare data for the pie chart
        const branchesData = @json($branchesPerDistrict);

        // Extract labels (district codes) and data (total branches in each district)
        const labels = branchesData.map(item => item.districtCode);
        const data = branchesData.map(item => item.total_branches);

        // Create the pie chart using Chart.js
        const ctx = document.getElementById('branchesPerDistrictChart').getContext('2d');
        const branchesPerDistrictChart = new Chart(ctx, {
            type: 'doughnut', // Pie chart type
            data: {
                labels: labels,
                datasets: [{
                    label: 'Branches per District',
                    data: data,
                    backgroundColor: [
                        '#FF5733', '#33FF57', '#3357FF', '#FF33A1', '#F3FF33',
                        '#FF8C00' // Example colors
                    ],
                    borderColor: '#fff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, 
                plugins: {
                    legend: {
                        position: 'bottom',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' branches';
                            }
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
