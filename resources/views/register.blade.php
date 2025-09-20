<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <!-- Essential Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>Course Registration - YoungBotMinds | Enroll in Robotics & Coding Programs</title>
    <meta name="description"
        content="Register for revolutionary robotics and coding courses at YoungBotMinds. Choose from age-appropriate programs with hands-on STEM learning. Start your child's tech journey today!">
    <meta name="keywords"
        content="course registration, robotics enrollment, coding classes signup, STEM education registration, kids programming courses, robotics workshops enrollment, YoungBotMinds registration">
    <meta name="author" content="YoungBotMinds">
    <meta name="robots" content="index, follow">
    <meta name="language" content="English">
    <meta name="revisit-after" content="7 days">
    <meta name="classification" content="Education">
    <meta name="category" content="Education, Technology, Kids">
    <meta name="coverage" content="Worldwide">
    <meta name="distribution" content="Global">
    <meta name="rating" content="General">

    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="Course Registration - YoungBotMinds | Enroll in Robotics & Coding Programs">
    <meta property="og:description"
        content="Register for revolutionary robotics and coding courses. Choose from age-appropriate programs with hands-on STEM learning at YoungBotMinds.">
    <meta property="og:image" content="{{ asset('img/favicon_io/android-chxrome-512x512.png') }}">
    <meta property="og:image:alt" content="YoungBotMinds Course Registration">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="YoungBotMinds">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Course Registration - YoungBotMinds | Enroll in Robotics & Coding Programs">
    <meta name="twitter:description"
        content="Register for revolutionary robotics and coding courses. Choose from age-appropriate programs with hands-on STEM learning.">
    <meta name="twitter:image" content="{{ asset('img/favicon_io/android-chrome-512x512.png') }}">
    <meta name="twitter:image:alt" content="YoungBotMinds Course Registration">
    <meta name="twitter:creator" content="@YoungBotMinds">
    <meta name="twitter:site" content="@YoungBotMinds">

    <!-- Mobile & PWA Meta Tags -->
    <meta name="theme-color" content="#FFCA4C">
    <meta name="msapplication-TileColor" content="#FFCA4C">
    <meta name="msapplication-config" content="{{ asset('img/favicon_io/browserconfig.xml') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="YoungBotMinds Registration">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Favicon and Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon_io/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon_io/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon_io/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon_io/site.webmanifest') }}">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Fonts -->
    <link rel="preload"
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cairo:wght@300;400;600;700&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Cairo:wght@300;400;600;700&display=swap">
    </noscript>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- JSON-LD Structured Data -->
</head>

<body>

    @include('components.header', ['showMenu' => false])
    <div style="margin-top: 100px;"
        class="container-fluid min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="row justify-content-center w-100 g-0">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5">
                <div class="card shadow-lg border-0 rounded-lg">
                    <div class="card-body p-4 p-md-5">
                        <!-- Header -->
                        <div class="text-center mb-4">
                            <div class="mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle text-white"
                                style="width: 60px; height: 60px; background: linear-gradient(135deg, #FFCA4C, #FFD700);">
                                <i class="fas fa-graduation-cap fa-2x"></i>
                            </div>
                            <h2 class="card-title h3 mb-2"
                                style="color: #333; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'center' }};">
                                {{ __('other.course_registration') }}</h2>
                            <p
                                style="color: #666; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'center' }};">
                                {{ __('other.join_educational_programs') }}</p>
                        </div>

                        <!-- Registration Form -->
                        <form action="{{ route('registration.submit') }}" method="POST" id="registrationForm">
                            @csrf

                            <!-- Child Information Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"
                                    style="color: #FFCA4C; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    <i
                                        class="fas fa-child {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}"></i>{{ __('other.child_information') }}
                                </h5>

                                <div class="mb-3">
                                    <label for="child_name" class="form-label fw-medium"
                                        style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                        {{ __('other.child_name') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control @error('child_name') is-invalid @enderror" id="child_name"
                                        name="child_name" required placeholder="{{ __('other.enter_child_name') }}"
                                        value="{{ old('child_name') }}"
                                        style="border: 2px solid #e9ecef; border-radius: 10px; padding: 10px 12px; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    @error('child_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="child_age" class="form-label fw-medium"
                                        style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                        {{ __('other.child_age') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="number"
                                        class="form-control @error('child_age') is-invalid @enderror" id="child_age"
                                        name="child_age" min="3" max="18" required
                                        placeholder="{{ __('other.enter_child_age') }}"
                                        value="{{ old('child_age') }}"
                                        style="border: 2px solid #e9ecef; border-radius: 10px; padding: 10px 12px; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    @error('child_age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Parent/Guardian Information Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"
                                    style="color: #FFCA4C; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    <i
                                        class="fas fa-users {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}"></i>{{ __('other.parent_guardian_information') }}
                                </h5>

                                <div class="mb-3">
                                    <label for="parent_phone" class="form-label fw-medium"
                                        style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                        {{ __('other.phone_number') }} <span class="text-danger">*</span>
                                    </label>
                                    <input type="tel"
                                        class="form-control @error('parent_phone') is-invalid @enderror"
                                        id="parent_phone" name="parent_phone" required
                                        placeholder="{{ __('other.enter_phone_number') }}"
                                        value="{{ old('parent_phone') }}"
                                        style="border: 2px solid #e9ecef; border-radius: 10px; padding: 10px 12px; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    @error('parent_phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Additional Information Section -->
                            <div class="mb-4">
                                <h5 class="border-bottom pb-2 mb-3"
                                    style="color: #FFCA4C; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    <i
                                        class="fas fa-info-circle {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}"></i>{{ __('other.additional_information') }}
                                </h5>

                                <div class="mb-3">
                                    <label for="preferred_time_slot" class="form-label fw-medium"
                                        style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                        {{ __('other.preferred_time_slot') }}
                                    </label>
                                    <select class="form-select @error('preferred_time_slot') is-invalid @enderror"
                                        id="preferred_time_slot" name="preferred_time_slot"
                                        style="border: 2px solid #e9ecef; border-radius: 10px; padding: 10px 12px; line-height: 1.5; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                        <option value="">{{ __('other.select_time_slot') }}</option>
                                        <option value="morning"
                                            {{ old('preferred_time_slot') == 'morning' ? 'selected' : '' }}>
                                            {{ __('other.morning') }}
                                        </option>
                                        <option value="afternoon"
                                            {{ old('preferred_time_slot') == 'afternoon' ? 'selected' : '' }}>
                                            {{ __('other.afternoon') }}
                                        </option>
                                        <option value="evening"
                                            {{ old('preferred_time_slot') == 'evening' ? 'selected' : '' }}>
                                            {{ __('other.evening') }}
                                        </option>
                                        <option value="weekend"
                                            {{ old('preferred_time_slot') == 'weekend' ? 'selected' : '' }}>
                                            {{ __('other.weekend') }}
                                        </option>
                                    </select>
                                    @error('preferred_time_slot')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Actions -->
                            <div class="text-center mt-4">
                                <button type="submit" class="btn px-4" id="submitBtn"
                                    style="background: linear-gradient(135deg, #FFCA4C, #FFD700); border: none; color: white; font-weight: 600; font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">
                                    <i
                                        class="fas fa-paper-plane {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}"></i>
                                    <span id="submitText">{{ __('other.register') }}</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    @if (session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11;">
            <div id="successToast" class="toast show" role="alert">
                <div class="toast-header bg-success text-white">
                    <i class="fas fa-check-circle {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}"></i>
                    <strong class="me-auto"
                        style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">{{ __('other.success') }}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    {{ session('success') }}
                </div>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 11;">
            <div id="errorToast" class="toast show" role="alert">
                <div class="toast-header bg-danger text-white">
                    <i class="fas fa-exclamation-circle {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}"></i>
                    <strong class="me-auto"
                        style="font-family: {{ app()->getLocale() === 'ar' ? 'Cairo, sans-serif' : 'inherit' }}; direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}; text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};">{{ __('other.error') }}</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast"></button>
                </div>
                <div class="toast-body">
                    {{ session('error') }}
                </div>
            </div>
        </div>
    @endif

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('registrationForm');
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');

            // Form submission handling
            form.addEventListener('submit', function(e) {
                submitBtn.disabled = true;
                submitBtn.innerHTML = `
                    <span class="spinner-border spinner-border-sm {{ app()->getLocale() === 'ar' ? 'ms-2' : 'me-2' }}" role="status"></span>
                    <span>{{ __('other.processing') }}</span>
                `;
            });

            // Auto-hide toasts after 5 seconds
            const toasts = document.querySelectorAll('.toast');
            toasts.forEach(toast => {
                setTimeout(() => {
                    const bsToast = new bootstrap.Toast(toast);
                    bsToast.hide();
                }, 5000);
            });
        });
    </script>

    <style>
        /* Fix horizontal overflow and white space issues */
        html,
        body {
            max-width: 100vw;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }

        * {
            box-sizing: border-box;
        }

        /* Custom Form Styling */
        .form-control:focus,
        .form-select:focus {
            border-color: #FFCA4C !important;
            box-shadow: 0 0 0 0.2rem rgba(255, 202, 76, 0.25) !important;
        }

        .form-control,
        .form-select {
            transition: all 0.3s ease;
        }

        .form-control:hover,
        .form-select:hover {
            border-color: #FFCA4C;
        }

        /* Prevent container from causing overflow */
        .container-fluid {
            padding-left: 0 !important;
            padding-right: 0 !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
            max-width: 100vw;
            overflow-x: hidden;
        }

        /* Fix row margins causing overflow */
        .row {
            margin-left: 0 !important;
            margin-right: 0 !important;
            max-width: 100vw;
        }

        /* Ensure columns don't overflow */
        [class*="col-"] {
            padding-left: 8px;
            padding-right: 8px;
            max-width: 100%;
        }

        /* Mobile First Responsive Design */
        @media (max-width: 575px) {
            .container-fluid {
                padding: 0 !important;
            }

            .row {
                margin: 0 !important;
            }

            [class*="col-"] {
                padding: 0 8px !important;
            }

            .card {
                margin: 0 !important;
                border-radius: 0 !important;
                box-shadow: none !important;
                border: none !important;
                background: transparent !important;
            }

            .card-body {
                padding: 15px !important;
            }

            /* Fix form sections spacing */
            .mb-4 {
                margin-bottom: 1.5rem !important;
            }

            .mb-3 {
                margin-bottom: 1rem !important;
            }
        }

        /* Very small screens */
        @media (max-width: 450px) {
            .card-body {
                padding: 10px !important;
            }

            .form-control,
            .form-select {
                font-size: 16px;
                /* Prevents zoom on iOS */
            }
        }

        /* Extra small screens */
        @media (max-width: 350px) {
            .card-body {
                padding: 5px !important;
            }

            .text-center h2 {
                font-size: 1.5rem !important;
            }
        }

        /* Medium screens improvements */
        @media (min-width: 576px) and (max-width: 768px) {
            .container-fluid {
                padding: 0 15px;
            }

            .card {
                margin: 0 auto;
                max-width: 100%;
            }
        }

        /* Large screens */
        @media (min-width: 769px) {
            .container-fluid {
                padding: 0 20px;
            }
        }

        /* Fix any potential Bootstrap gutter issues */
        .g-0,
        .gx-0 {
            --bs-gutter-x: 0;
        }

        .g-0,
        .gy-0 {
            --bs-gutter-y: 0;
        }

        /* RTL Support for Arabic */
        [dir="rtl"] .card-body {
            text-align: right;
        }

        [dir="rtl"] .form-label {
            text-align: right;
        }

        [dir="rtl"] .form-control,
        [dir="rtl"] .form-select {
            text-align: right;
            direction: rtl;
        }

        [dir="rtl"] .border-bottom {
            text-align: right;
        }

        [dir="rtl"] .text-center {
            text-align: right !important;
        }

        [dir="rtl"] .invalid-feedback {
            text-align: right;
        }
    </style>

    @include('components.footer')
</body>

</html>
