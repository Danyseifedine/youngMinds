@props([
    'chartId',
    'title',
    'chartType' => 'pie',
    'data' => [],
    'showStudentList' => true,
    'height' => 300,
    'colors' => [
        '#FF6384',
        '#36A2EB',
        '#FFCE56',
        '#4BC0C0',
        '#9966FF',
        '#FF9F40',
        '#FF6384',
        '#4BC0C0',
        '#36A2EB',
        '#FFCE56',
    ],
])

<div class="card border-0 shadow-sm h-100">
    <div class="card-header bg-warning text-dark text-center">
        <h5 class="mb-0 fw-bold">{{ $title }}</h5>
    </div>
    <div class="card-body text-center">
        <div style="position: relative; height: {{ $height }}px;">
            <div id="{{ $chartId }}" style="width: 100%; height: {{ $height }}px;"></div>
        </div>
    </div>
</div>

@push('js')
    <script>
        // ApexCharts initialization for {{ $chartId }}
        function initApexChart{{ $chartId }}() {
            if (typeof ApexCharts === 'undefined') {
                return;
            }

            const chartElement = document.getElementById('{{ $chartId }}');
            if (!chartElement) {
                return;
            }

            // Prepare data - for each student, show their percentage and remaining
            const chartData = [];
            const chartLabels = [];
            const chartColors = [];

            @foreach ($data as $index => $student)
                // Add student's actual percentage
                chartData.push({{ $student['percentage'] }});
                chartLabels.push('{{ addslashes($student['student_name']) }} ({{ $student['percentage'] }}%)');
                chartColors.push('#FFD700'); // Yellow color

                // Add remaining percentage if less than 100%
                if ({{ $student['percentage'] }} < 100) {
                    chartData.push(100 - {{ $student['percentage'] }});
                    chartLabels.push('Remaining ({{ 100 - $student['percentage'] }}%)');
                    chartColors.push('#E5E7EB'); // Light gray for remaining
                }
            @endforeach

            if (chartLabels.length === 0) {
                return;
            }

            // Create chart configuration
            const chartConfig = {
                series: chartData,
                chart: {
                    type: '{{ $chartType === 'donut' ? 'donut' : ($chartType === 'circular' ? 'polarArea' : 'pie') }}',
                    height: {{ $height }},
                    width: '100%'
                },
                labels: chartLabels,
                colors: chartColors,
                legend: {
                    position: 'bottom'
                },
                @if ($chartType === 'donut')
                    plotOptions: {
                        pie: {
                            donut: {
                                size: '50%'
                            }
                        }
                    }
                @endif
            };

            // Create chart
            try {
                const chart = new ApexCharts(chartElement, chartConfig);
                chart.render();
            } catch (error) {
                // Silent fail
            }
        }

        // Initialize when DOM is ready
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', initApexChart{{ $chartId }});
        } else {
            initApexChart{{ $chartId }}();
        }
    </script>
@endpush
