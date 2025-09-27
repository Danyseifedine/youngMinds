@extends('layouts.main')
@section('content')
    <!-- Main Content -->
    <main id="main-content" role="main">
        <!-- Hero Section with SEO Content -->
        <section class="hero-section" aria-label="Hero">
            @include('components.hero')
        </section>

        <!-- Features Section -->
        <section class="features-section" aria-label="Features">
            @include('components.features')
        </section>

        <!-- Why Choose Us Section -->
        <section class="why-choose-section" aria-label="Why Choose Us">
            @include('components.why_choose_us')
        </section>

        <!-- Programs Section -->
        <section class="programs-section" aria-label="Programs">
            @include('components.programs')
        </section>

        <!-- Students Section -->
        <section class="students-section" aria-label="Students">
            @include('components.students')
        </section>

        <!-- Events Section -->
        <section class="events-section" aria-label="Events">
            @include('components.events')
        </section>

        <!-- About Section -->
        <section class="about-section" aria-label="About Us">
            @include('components.about')
        </section>

        <!-- Stats Section -->
        <section class="stats-section" aria-label="Statistics">
            @include('components.stats')
        </section>

        <!-- Advanced Features Section -->
        <section class="advanced-section" aria-label="Advanced Features">
            @include('components.advanced-features')
        </section>

        <!-- Map Section -->
        <section class="map-section" aria-label="Location">
            @include('components.map')
        </section>
    </main>



    <!-- Success Toast Notification -->
    @if (session('success'))
        <div id="successToast" class="toast-notification position-fixed"
            style="top: 20px; right: 20px; z-index: 9999; max-width: 400px;" role="alert" aria-live="polite"
            aria-atomic="true">
            <div class="alert alert-success fade show d-flex align-items-center"
                style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); border: none;">
                <i class="fas fa-check-circle" style="font-size: 1.2rem; margin-right: 15px;" aria-hidden="true"></i>
                <div class="flex-grow-1">
                    <strong>{{ $isArabic ? 'نجاح!' : 'Success!' }}</strong><br>
                    <span>{{ session('success') }}</span>
                </div>

            </div>
        </div>
    @endif
@endsection
