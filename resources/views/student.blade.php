@extends('layouts.main')

@section('title')
    {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'إحصائيات الطلاب - يونج بوت مايندز' : 'Student Statistics - Young Bot Minds' }}
@endsection

@section('description')
    {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'عرض إحصائيات وأداء الطلاب في أكاديمية يونج بوت مايندز' : 'View student statistics and performance at Young Bot Minds academy' }}
@endsection

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10" style="margin-top: 100px;">
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-primary mb-3">
                        {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'إحصائيات الطلاب' : 'Student Statistics' }}
                    </h1>
                    <p class="lead text-muted">
                        {{ LaravelLocalization::getCurrentLocale() == 'ar'
                            ? 'عرض أداء وتقييم الطلاب في مختلف المجالات'
                            : 'View student performance and evaluation across different areas' }}
                    </p>
                </div>

                @if (isset($statisticsData) && count($statisticsData) > 0)
                    <div class="row">
                        @foreach ($statisticsData as $index => $statData)
                            <div class="col-lg-4 col-md-6 mb-4">
                                @switch($statData['category']->chart_type)
                                    @case('pie')
                                        <x-charts.pie-chart chart-id="chart_{{ $index }}" :title="$statData['category']->localized_title"
                                            :data="$statData['data']" />
                                    @break

                                    @case('donut')
                                        <x-charts.donut-chart chart-id="chart_{{ $index }}" :title="$statData['category']->localized_title"
                                            :data="$statData['data']" />
                                    @break

                                    @case('circular')
                                        <x-charts.circular-chart chart-id="chart_{{ $index }}" :title="$statData['category']->localized_title"
                                            :data="$statData['data']" />
                                    @break

                                    @default
                                        <x-charts.pie-chart chart-id="chart_{{ $index }}" :title="$statData['category']->localized_title"
                                            :data="$statData['data']" />
                                @endswitch
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card border-0 shadow-sm">
                                <div class="card-body text-center py-5">
                                    <div class="mb-4">
                                        <i class="bi bi-bar-chart-fill text-muted" style="font-size: 4rem;"></i>
                                    </div>
                                    <h4 class="text-muted mb-3">
                                        {{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'لا توجد إحصائيات' : 'No Statistics Available' }}
                                    </h4>
                                    <p class="text-muted">
                                        {{ LaravelLocalization::getCurrentLocale() == 'ar'
                                            ? 'لم يتم إنشاء أي إحصائيات للطلاب بعد'
                                            : 'No student statistics have been created yet' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@latest"></script>
@endpush

@push('styles')
    <style>
        .chart-card {
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .chart-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        .chart-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            padding: 1.5rem 1rem;
        }

        .chart-header h5 {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .chart-header small {
            opacity: 0.9;
            font-size: 0.85rem;
        }

        .chart-body {
            padding: 2rem 1.5rem;
        }

        .student-badge {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            border: none;
            font-size: 0.8rem;
            padding: 0.5rem 0.75rem;
            border-radius: 20px;
            margin: 0.25rem;
            display: inline-block;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .student-list {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 1rem;
            margin-top: 1rem;
        }

        .student-list h6 {
            color: #495057;
            font-weight: 600;
            margin-bottom: 0.75rem;
        }

        @media (max-width: 768px) {
            .chart-card {
                margin-bottom: 2rem;
            }

            .chart-body {
                padding: 1.5rem 1rem;
            }
        }

        /* Chart container styling */
        .chart-container {
            position: relative;
            min-height: 300px;
        }
    </style>
@endpush
