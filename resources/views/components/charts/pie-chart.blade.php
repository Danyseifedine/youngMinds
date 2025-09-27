@props([
    'chartId',
    'title',
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

<x-charts.base-chart :chart-id="$chartId" :title="$title" chart-type="pie" :data="$data" :show-student-list="$showStudentList"
    :height="$height" :colors="$colors" />
