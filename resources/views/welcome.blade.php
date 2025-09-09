<!doctype html>
<html lang="en">

<head>
    <!-- Essential Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title>YoungBotMinds - Revolutionary Robotics & Coding Education for Kids | STEM Learning</title>
    <meta name="description"
        content="Transform your child's future with YoungBotMinds! Award-winning robotics and coding education platform for ages 8-18. Interactive workshops, AI programming, and hands-on STEM learning. Enroll today!">
    <meta name="keywords"
        content="robotics education, coding for kids, STEM learning, programming classes, AI education, robotics workshops, tech education, kids coding bootcamp, young programmers, educational robotics, Arduino programming, Python for kids">
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
    <meta property="og:title" content="YoungBotMinds - Revolutionary Robotics & Coding Education for Kids">
    <meta property="og:description"
        content="Transform your child's future with award-winning robotics and coding education. Interactive workshops, AI programming, and hands-on STEM learning for ages 8-18.">
    <meta property="og:image" content="{{ asset('img/favicon_io/android-chxrome-512x512.png') }}">
    <meta property="og:image:alt" content="YoungBotMinds Logo - Robotics Education Platform">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="YoungBotMinds">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="YoungBotMinds - Revolutionary Robotics & Coding Education for Kids">
    <meta name="twitter:description"
        content="Transform your child's future with award-winning robotics and coding education. Interactive workshops, AI programming, and hands-on STEM learning.">
    <meta name="twitter:image" content="{{ asset('img/favicon_io/android-chrome-512x512.png') }}">
    <meta name="twitter:image:alt" content="YoungBotMinds - Robotics Education Platform">
    <meta name="twitter:creator" content="@YoungBotMinds">
    <meta name="twitter:site" content="@YoungBotMinds">

    <!-- Mobile & PWA Meta Tags -->
    <meta name="theme-color" content="#FFCA4C">
    <meta name="msapplication-TileColor" content="#FFCA4C">
    <meta name="msapplication-config" content="{{ asset('img/favicon_io/browserconfig.xml') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="YoungBotMinds">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ url('/') }}">

    <!-- Favicon and Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon_io/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon_io/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon_io/favicon-32x32.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon_io/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon_io/site.webmanifest') }}">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <!-- style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Custom Modern CSS -->

    <!-- Structured Data (JSON-LD) -->
    <!-- Structured Data (JSON-LD) -->
    @php
        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'EducationalOrganization',
            'name' => 'YoungBotMinds',
            'alternateName' => 'Young Bot Minds',
            'url' => url('/'),
            'logo' => asset('img/favicon_io/android-chrome-512x512.png'),
            'description' =>
                'Revolutionary robotics and coding education platform for kids aged 8-18. Offering interactive workshops, AI programming, and hands-on STEM learning experiences.',
            'foundingDate' => '2024',
            'keywords' => [
                'robotics education',
                'coding for kids',
                'STEM learning',
                'programming classes',
                'AI education',
                'robotics workshops',
                'tech education',
            ],
            'educationalCredentialAwarded' => 'Certificate of Completion',
            'audience' => [
                '@type' => 'EducationalAudience',
                'audienceType' => 'student',
                'educationalRole' => 'student',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'Educational Programs',
                'itemListElement' => [
                    [
                        '@type' => 'Course',
                        'name' => 'Robotics Workshop',
                        'description' => 'Learn to build and program robots using cutting-edge technology',
                        'provider' => [
                            '@type' => 'EducationalOrganization',
                            'name' => 'YoungBotMinds',
                        ],
                    ],
                    [
                        '@type' => 'Course',
                        'name' => 'Python Programming Bootcamp',
                        'description' => 'Master Python programming from basics to advanced concepts',
                        'provider' => [
                            '@type' => 'EducationalOrganization',
                            'name' => 'YoungBotMinds',
                        ],
                    ],
                    [
                        '@type' => 'Course',
                        'name' => 'AI & Machine Learning Introduction',
                        'description' =>
                            'Discover the fascinating world of artificial intelligence and machine learning',
                        'provider' => [
                            '@type' => 'EducationalOrganization',
                            'name' => 'YoungBotMinds',
                        ],
                    ],
                ],
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'availableLanguage' => ['English'],
            ],
            'sameAs' => [
                'https://facebook.com/YoungBotMinds',
                'https://twitter.com/YoungBotMinds',
                'https://instagram.com/YoungBotMinds',
                'https://linkedin.com/company/youngbotminds',
            ],
        ];

        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => 'YoungBotMinds',
            'url' => url('/'),
            'description' => 'Revolutionary robotics and coding education for kids',
            'publisher' => [
                '@type' => 'EducationalOrganization',
                'name' => 'YoungBotMinds',
            ],
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => url('/') . '?q={search_term_string}',
                'query-input' => 'required name=search_term_string',
            ],
        ];
    @endphp

    <script type="application/ld+json">
{!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES) !!}
</script>

    <!-- Additional Structured Data for Website -->
    <script type="application/ld+json">
{!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES) !!}
</script>
</head>

<body>
    @include('components.header')

    @include('components.hero')

    @include('components.features')

    @include('components.why_choose_us')

    @include('components.programs')

    @include('components.students')

    @include('components.events')

    @include('components.about')

    @include('components.stats')

    @include('components.advanced-features')

    @include('components.map')

    @include('components.footer')

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </button>

    <!-- Success Toast -->
    @if (session('success'))
        <div id="successToast" class="position-fixed"
            style="top: 20px; right: 20px; z-index: 9999; max-width: 400px;">
            <div class="alert alert-success fade show d-flex align-items-center" role="alert"
                style="border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); border: none;">
                <i class="fas fa-check-circle" style="font-size: 1.2rem; margin-right: 15px;"></i>
                <div class="flex-grow-1">
                    <strong>Success!</strong><br>
                    <span>{{ session('success') }}</span>
                </div>
            </div>
        </div>
    @endif

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('js/waypoints.min.js') }}"></script>
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Initialize AOS
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Toast functionality
        function closeToast() {
            const toast = document.getElementById('successToast');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                toast.style.transition = 'all 0.3s ease';
                setTimeout(() => {
                    toast.remove();
                }, 300);
            }
        }

        // Auto-hide toast after 5 seconds
        if (document.getElementById('successToast')) {
            setTimeout(closeToast, 5000);
        }

        // Scroll to Top functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');

        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });

        // Smooth scroll to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }
    </script>

    <!-- Scroll to Top Button Styles -->
    <style>
        .scroll-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #FFCA4C, #FFD700);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 18px;
            cursor: pointer;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 202, 76, 0.4);
        }

        .scroll-to-top:hover {
            background: linear-gradient(135deg, #FFD700, #FFCA4C);
            transform: translateY(0);
            box-shadow: 0 6px 20px rgba(255, 202, 76, 0.6);
        }

        .scroll-to-top.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .scroll-to-top:active {
            transform: scale(0.95);
        }

        /* Mobile responsive */
        @media (max-width: 768px) {
            .scroll-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                font-size: 16px;
            }
        }

        @media (max-width: 480px) {
            .scroll-to-top {
                bottom: 15px;
                right: 15px;
                width: 40px;
                height: 40px;
                font-size: 14px;
            }
        }
    </style>
</body>

</html>
