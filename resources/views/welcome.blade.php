<!doctype html>
<html lang="{{ LaravelLocalization::getCurrentLocale() }}" dir="{{ LaravelLocalization::getCurrentLocaleDirection() }}"
    prefix="og: http://ogp.me/ns#">

<head>
    <!-- Priority Meta Tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Language and Region Meta Tags -->
    <meta name="language" content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'Arabic' : 'English' }}">
    <meta name="geo.region" content="LB">
    <meta name="geo.placename" content="Beirut">
    <meta name="geo.position" content="33.8938;35.5018">
    <meta name="ICBM" content="33.8938, 35.5018">

    <!-- Google Site Verification (add your verification code) -->
    <meta name="google-site-verification" content="YOUR_VERIFICATION_CODE_HERE">

    <!-- Dynamic SEO Meta Tags Based on Language -->
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <title>يونج بوت مايندز - أكاديمية الروبوتات والبرمجة الرائدة في لبنان | تعليم STEM في بيروت</title>
        <meta name="description"
            content="يونج بوت مايندز - أفضل أكاديمية روبوتات وبرمجة للأطفال في لبنان. برامج STEM للأعمار 5-14. تعلم الأردوينو، روبوتات LEGO، وبرمجة Python. انضم لأفضل أكاديمية تقنية في بيروت!">
        <meta name="keywords"
            content="يونج بوت مايندز, young bot minds lebanon, روبوتات لبنان, برمجة للأطفال بيروت, تعليم STEM لبنان, أردوينو لبنان, برمجة الأطفال, أكاديمية الروبوتات لبنان, youngbotminds, تعليم التكنولوجيا بيروت">
    @else
        <title>Young Bot Minds Lebanon - Leading Robotics & Coding Academy in Beirut | STEM Education</title>
        <meta name="description"
            content="Young Bot Minds - Lebanon's premier robotics and coding education center in Beirut. Award-winning STEM programs for kids aged 5-14. Arduino, LEGO robotics, Python programming. Join Lebanon's top tech academy!">
        <meta name="keywords"
            content="young bot minds, youngbotminds, young bot minds lebanon, robotics lebanon, coding classes beirut, STEM education lebanon, arduino lebanon, kids programming beirut, robotics academy lebanon, lego robotics beirut, python for kids lebanon">
    @endif

    <meta name="author" content="Young Bot Minds">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="googlebot" content="index, follow">
    <meta name="revisit-after" content="3 days">
    <meta name="classification" content="Education">
    <meta name="category" content="Education, Technology, Kids, Robotics">
    <meta name="coverage" content="Lebanon">
    <meta name="distribution" content="Local">
    <meta name="rating" content="General">
    <meta name="target" content="Kids, Parents, Students">

    <!-- Canonical URL with proper localization handling -->
    @php
        $currentUrl = LaravelLocalization::getLocalizedURL(LaravelLocalization::getCurrentLocale(), null, [], true);
    @endphp
    <link rel="canonical" href="{{ $currentUrl }}">

    <!-- Hreflang Tags for Multi-language SEO -->
    @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <link rel="alternate" hreflang="{{ $localeCode }}"
            href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
    @endforeach
    <link rel="alternate" hreflang="x-default" href="{{ LaravelLocalization::getNonLocalizedURL(Request::path()) }}">

    <!-- Open Graph Meta Tags with Localization -->
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <meta property="og:title" content="يونج بوت مايندز - أكاديمية الروبوتات والبرمجة في لبنان">
        <meta property="og:description"
            content="حوّل مستقبل طفلك مع تعليم الروبوتات والبرمجة الحائز على جوائز. ورش عمل تفاعلية، برمجة الذكاء الاصطناعي، وتعلم STEM العملي للأعمار 5-14.">
    @else
        <meta property="og:title" content="Young Bot Minds Lebanon - Revolutionary Robotics & Coding Education">
        <meta property="og:description"
            content="Transform your child's future with Lebanon's leading robotics and coding education. Interactive workshops, AI programming, and hands-on STEM learning for ages 5-14.">
    @endif

    <meta property="og:image" content="{{ asset('img/og-image-youngbotminds.jpg') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Young Bot Minds - Robotics Education in Lebanon">
    <meta property="og:url" content="{{ $currentUrl }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Young Bot Minds">
    <meta property="og:locale" content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'ar_LB' : 'en_US' }}">
    <meta property="og:locale:alternate"
        content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'en_US' : 'ar_LB' }}">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title"
        content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'يونج بوت مايندز - أكاديمية الروبوتات في لبنان' : 'Young Bot Minds Lebanon - Robotics Academy' }}">
    <meta name="twitter:description"
        content="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? 'أفضل أكاديمية روبوتات وبرمجة للأطفال في لبنان' : 'Lebanon\'s premier robotics and coding academy for kids' }}">
    <meta name="twitter:image" content="{{ asset('img/twitter-card-youngbotminds.jpg') }}">
    <meta name="twitter:image:alt" content="Young Bot Minds Lebanon">
    <meta name="twitter:site" content="@YoungBotMinds">
    <meta name="twitter:creator" content="@YoungBotMinds">

    <!-- Mobile & PWA Meta Tags -->
    <meta name="application-name" content="Young Bot Minds">
    <meta name="theme-color" content="#FFCA4C">
    <meta name="msapplication-TileColor" content="#FFCA4C">
    <meta name="msapplication-TileImage" content="{{ asset('img/favicon_io/ms-icon-144x144.png') }}">
    <meta name="msapplication-config" content="{{ asset('img/favicon_io/browserconfig.xml') }}">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Young Bot Minds">
    <meta name="format-detection" content="telephone=no">

    <!-- Favicon and Icons -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon_io/favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon_io/favicon-16x16.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"
        href="{{ asset('img/favicon_io/android-chrome-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="512x512"
        href="{{ asset('img/favicon_io/android-chrome-512x512.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon_io/apple-touch-icon.png') }}">
    <link rel="manifest" href="{{ asset('img/favicon_io/site.webmanifest') }}">

    <!-- Preconnect for Performance -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdnjs.cloudflare.com">
    <link rel="preconnect" href="https://unpkg.com">
    <link rel="preconnect" href="https://cdn.jsdelivr.net">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">

    <!-- Critical CSS (inline for performance) -->
    <style>
        /* Critical above-the-fold styles */
        :root {
            --primary-color: #FFCA4C;
            --secondary-color: #FFD700;
            --text-dark: #2c3e50;
            --text-light: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
        }

        /* Prevent layout shift */
        .header {
            min-height: 70px;
        }

        /* RTL Support */
        [dir="rtl"] {
            text-align: right;
        }

        [dir="rtl"] .text-left {
            text-align: right !important;
        }

        [dir="rtl"] .text-right {
            text-align: left !important;
        }
    </style>

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

    <!-- FontAwesome CSS (defer non-critical) -->
    <link rel="preload" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </noscript>

    <!-- AOS Animation CSS (defer) -->
    <link rel="preload" href="https://unpkg.com/aos@2.3.1/dist/aos.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    </noscript>

    <!-- Swiper CSS (defer) -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" as="style"
        onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    </noscript>

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- RTL CSS if Arabic -->
    @if (LaravelLocalization::getCurrentLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif

    <!-- Structured Data (JSON-LD) -->
    @php
        $currentLang = LaravelLocalization::getCurrentLocale();
        $isArabic = $currentLang == 'ar';

        // Organization + LocalBusiness Combined Schema
        $organizationSchema = [
            '@context' => 'https://schema.org',
            '@type' => ['EducationalOrganization', 'LocalBusiness'],
            '@id' => url('/') . '#organization',
            'name' => 'Young Bot Minds',
            'alternateName' => ['YoungBotMinds', 'YBM', $isArabic ? 'يونج بوت مايندز' : 'Young Bot Minds Lebanon'],
            'url' => url('/'),
            'logo' => asset('img/logo-youngbotminds.png'),
            'image' => [
                asset('img/youngbotminds-building.jpg'),
                asset('img/youngbotminds-classroom.jpg'),
                asset('img/youngbotminds-students.jpg'),
            ],
            'description' => $isArabic
                ? 'أكاديمية رائدة لتعليم الروبوتات والبرمجة للأطفال في لبنان. نقدم برامج STEM تفاعلية للأعمار 5-14'
                : 'Leading robotics and coding academy for kids in Lebanon. Offering interactive STEM programs for ages 5-14',
            'foundingDate' => '2024-01-01',
            'founders' => [
                '@type' => 'Person',
                'name' => 'Founder Name',
            ],
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Your Street Address',
                'addressLocality' => 'Beirut',
                'addressRegion' => 'Beirut Governorate',
                'postalCode' => '1100',
                'addressCountry' => 'LB',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 33.8938,
                'longitude' => 35.5018,
            ],
            'telephone' => '+961-XX-XXXXXX',
            'email' => 'info@youngbotminds.com',
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '09:00',
                    'closes' => '18:00',
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => 'Saturday',
                    'opens' => '09:00',
                    'closes' => '14:00',
                ],
            ],
            'priceRange' => '$$',
            'paymentAccepted' => 'Cash, Credit Card',
            'currenciesAccepted' => 'USD, LBP',
            'areaServed' => [
                '@type' => 'City',
                'name' => 'Beirut',
                'containedIn' => [
                    '@type' => 'Country',
                    'name' => 'Lebanon',
                ],
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => $isArabic ? 'البرامج التعليمية' : 'Educational Programs',
                'itemListElement' => [
                    [
                        '@type' => 'Course',
                        'name' => $isArabic ? 'ورشة الروبوتات للمبتدئين' : 'Beginner Robotics Workshop',
                        'description' => $isArabic
                            ? 'تعلم بناء وبرمجة الروبوتات باستخدام LEGO WeDo'
                            : 'Learn to build and program robots using LEGO WeDo',
                        'provider' => [
                            '@type' => 'EducationalOrganization',
                            'name' => 'Young Bot Minds',
                        ],
                        'audience' => [
                            '@type' => 'EducationalAudience',
                            'educationalRole' => 'student',
                            'ageRange' => '5-7',
                        ],
                    ],
                    [
                        '@type' => 'Course',
                        'name' => $isArabic ? 'برمجة Python للأطفال' : 'Python Programming for Kids',
                        'description' => $isArabic
                            ? 'دورة برمجة Python من الأساسيات إلى المتقدم'
                            : 'Master Python programming from basics to advanced',
                        'provider' => [
                            '@type' => 'EducationalOrganization',
                            'name' => 'Young Bot Minds',
                        ],
                        'audience' => [
                            '@type' => 'EducationalAudience',
                            'educationalRole' => 'student',
                            'ageRange' => '12-14',
                        ],
                    ],
                    [
                        '@type' => 'Course',
                        'name' => $isArabic ? 'الأردوينو والإلكترونيات' : 'Arduino & Electronics',
                        'description' => $isArabic
                            ? 'تعلم الإلكترونيات وبرمجة الأردوينو'
                            : 'Learn electronics and Arduino programming',
                        'provider' => [
                            '@type' => 'EducationalOrganization',
                            'name' => 'Young Bot Minds',
                        ],
                        'audience' => [
                            '@type' => 'EducationalAudience',
                            'educationalRole' => 'student',
                            'ageRange' => '10-14',
                        ],
                    ],
                ],
            ],
            'slogan' => $isArabic ? 'نبني قادة التقنية للغد' : 'Building Tomorrow\'s Tech Leaders',
            'knowsAbout' => ['Robotics', 'Programming', 'STEM Education', 'Arduino', 'Python', 'LEGO Education'],
            'memberOf' => [
                '@type' => 'Organization',
                'name' => 'STEM Education Alliance',
            ],
            'review' => [
                '@type' => 'Review',
                'reviewRating' => [
                    '@type' => 'Rating',
                    'ratingValue' => '4.9',
                    'bestRating' => '5',
                ],
                'author' => [
                    '@type' => 'Person',
                    'name' => 'Parent Review',
                ],
            ],
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.9',
                'reviewCount' => '127',
                'bestRating' => '5',
                'worstRating' => '1',
            ],
            'contactPoint' => [
                '@type' => 'ContactPoint',
                'contactType' => 'customer service',
                'telephone' => '+961-XX-XXXXXX',
                'email' => 'info@youngbotminds.com',
                'availableLanguage' => ['English', 'Arabic'],
                'areaServed' => 'LB',
            ],
            'sameAs' => [
                'https://www.facebook.com/YoungBotMinds',
                'https://www.instagram.com/youngbotminds',
                'https://www.twitter.com/YoungBotMinds',
                'https://www.linkedin.com/company/young-bot-minds',
                'https://www.youtube.com/@YoungBotMinds',
                'https://wa.me/961XXXXXXXX',
            ],
        ];

        // WebSite Schema with SearchAction
        $websiteSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            '@id' => url('/') . '#website',
            'url' => url('/'),
            'name' => 'Young Bot Minds',
            'description' => $isArabic
                ? 'موقع أكاديمية يونج بوت مايندز للروبوتات والبرمجة في لبنان'
                : 'Young Bot Minds - Robotics and Coding Academy in Lebanon',
            'publisher' => [
                '@id' => url('/') . '#organization',
            ],
            'inLanguage' => $currentLang == 'ar' ? 'ar-LB' : 'en-US',
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => [
                    '@type' => 'EntryPoint',
                    'urlTemplate' => url('/search') . '?q={search_term_string}',
                ],
                'query-input' => 'required name=search_term_string',
            ],
        ];

        // BreadcrumbList Schema
        $breadcrumbSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => $isArabic ? 'الرئيسية' : 'Home',
                    'item' => url('/'),
                ],
            ],
        ];

        // FAQPage Schema
        $faqSchema = [
            '@context' => 'https://schema.org',
            '@type' => 'FAQPage',
            'mainEntity' => [
                [
                    '@type' => 'Question',
                    'name' => $isArabic ? 'ما هو العمر المناسب للانضمام؟' : 'What is the right age to join?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $isArabic
                            ? 'نقدم برامج للأطفال من عمر 5 إلى 14 سنة، مع مناهج مخصصة لكل فئة عمرية'
                            : 'We offer programs for children aged 5 to 14, with age-appropriate curriculum for each group',
                    ],
                ],
                [
                    '@type' => 'Question',
                    'name' => $isArabic ? 'هل تحتاجون خبرة سابقة؟' : 'Do you need prior experience?',
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $isArabic
                            ? 'لا، برامجنا مصممة للمبتدئين ونبدأ من الأساسيات'
                            : 'No, our programs are designed for beginners and we start from the basics',
                    ],
                ],
            ],
        ];
    @endphp

    <!-- Inject all Schema Markup -->
    <script type="application/ld+json">
    {!! json_encode($organizationSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($websiteSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($breadcrumbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <script type="application/ld+json">
    {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-KD2PD5CZ');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Additional SEO Enhancements -->
    <meta name="page-topic" content="Robotics Education">
    <meta name="page-type" content="Educational Institution">
    <meta name="audience" content="Parents, Students, Educators">
    <meta name="subject" content="STEM Education, Robotics, Programming">
    <meta name="copyright" content="Young Bot Minds {{ date('Y') }}">
    <meta name="designer" content="Young Bot Minds">
    <meta name="reply-to" content="info@youngbotminds.com">
    <meta name="owner" content="Young Bot Minds">
    <meta name="directory" content="submission">
    <meta name="pagename" content="Young Bot Minds - Home">
    <meta name="DC.Title" content="Young Bot Minds Lebanon">
    <meta name="DC.Creator" content="Young Bot Minds">
    <meta name="DC.Rights" content="Copyright {{ date('Y') }} Young Bot Minds">
    <meta name="DC.Publisher" content="Young Bot Minds">
    <meta name="DC.Description"
        content="{{ $isArabic ? 'أكاديمية الروبوتات والبرمجة في لبنان' : 'Robotics and Coding Academy in Lebanon' }}">
    <meta name="DC.Language" content="{{ $currentLang }}">

    <!-- Preload Critical Resources -->
    <link rel="preload" as="image" href="{{ asset('img/hero-background.jpg') }}">
    <link rel="preload" as="font" href="{{ asset('fonts/poppins-v20-latin-regular.woff2') }}"
        type="font/woff2" crossorigin>

    <!-- RSS Feed -->
    <link rel="alternate" type="application/rss+xml" title="Young Bot Minds Blog" href="{{ url('/feed') }}">
</head>

<body class="{{ $currentLang }}-lang" itemscope itemtype="https://schema.org/WebPage">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KD2PD5CZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Skip to Content (Accessibility) -->
    <a href="#main-content" class="skip-to-content">
        {{ __('Skip to main content') }}
    </a>

    <!-- Header Component -->
    @include('components.header')

    <!-- Main Content -->
    <main id="main-content" role="main">
        <!-- Hero Section with SEO Content -->
        <section class="hero-section" aria-label="Hero">
            @include('components.hero')

            <!-- Hidden H1 for SEO (if hero uses different tag) -->
            <h1 class="visually-hidden">
                {{ $isArabic
                    ? 'يونج بوت مايندز - أكاديمية الروبوتات والبرمجة الرائدة في لبنان'
                    : 'Young Bot Minds - Lebanon\'s Leading Robotics and Coding Academy' }}
            </h1>
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

    <!-- Footer Component -->
    <footer role="contentinfo">
        @include('components.footer')
    </footer>

    <!-- Scroll to Top Button -->
    <button id="scrollToTop" class="scroll-to-top"
        aria-label="{{ $isArabic ? 'العودة إلى الأعلى' : 'Back to top' }}"
        title="{{ $isArabic ? 'العودة إلى الأعلى' : 'Back to top' }}">
        <i class="fas fa-chevron-up" aria-hidden="true"></i>
    </button>

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
                <button type="button" class="btn-close ms-2" onclick="closeToast()"
                    aria-label="{{ $isArabic ? 'إغلاق' : 'Close' }}"></button>
            </div>
        </div>
    @endif

    <!-- Scripts - Optimized Loading Order -->

    <!-- jQuery (required for Bootstrap 4) -->
    <script src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>

    <!-- Popper.js -->
    <script src="{{ asset('js/popper.min.js') }}"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Counter Animation -->
    <script src="{{ asset('js/jquery.counterup.min.js') }}" defer></script>
    <script src="{{ asset('js/waypoints.min.js') }}" defer></script>

    <!-- AOS Animation -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js" defer></script>

    <!-- Inline Critical JavaScript -->
    <script>
        // Performance monitoring
        window.addEventListener('load', function() {
            // Log page load performance
            if (window.performance && window.performance.timing) {
                const perfData = window.performance.timing;
                const pageLoadTime = perfData.loadEventEnd - perfData.navigationStart;
                console.log('Page Load Time:', pageLoadTime + 'ms');

                // Send to analytics if needed
                if (typeof gtag !== 'undefined') {
                    gtag('event', 'timing_complete', {
                        'name': 'load',
                        'value': pageLoadTime,
                        'event_category': 'Performance'
                    });
                }
            }
        });

        // Initialize on DOM ready
        document.addEventListener('DOMContentLoaded', function() {

            // Initialize AOS
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1000,
                    once: true,
                    offset: 100,
                    disable: 'mobile'
                });
            }

            // Language-specific font adjustments
            const currentLang = '{{ $currentLang }}';
            if (currentLang === 'ar') {
                document.body.style.fontFamily =
                    '"Cairo", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif';
            }

            // Lazy load images
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src;
                            img.classList.remove('lazy');
                            observer.unobserve(img);
                        }
                    });
                });

                document.querySelectorAll('img.lazy').forEach(img => {
                    imageObserver.observe(img);
                });
            }
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Toast notification management
        function closeToast() {
            const toast = document.getElementById('successToast');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transform = 'translateX(100%)';
                toast.style.transition = 'all 0.3s ease';
                setTimeout(() => toast.remove(), 300);
            }
        }

        // Auto-hide toast after 5 seconds
        if (document.getElementById('successToast')) {
            setTimeout(closeToast, 5000);
        }

        // Scroll to Top functionality
        const scrollToTopBtn = document.getElementById('scrollToTop');

        // Show/hide button based on scroll position
        function toggleScrollButton() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        }

        // Throttle scroll event for performance
        let scrollTimeout;
        window.addEventListener('scroll', function() {
            if (scrollTimeout) {
                window.cancelAnimationFrame(scrollTimeout);
            }
            scrollTimeout = window.requestAnimationFrame(function() {
                toggleScrollButton();
            });
        });

        // Smooth scroll to top
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Form validation enhancement
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                const forms = document.getElementsByClassName('needs-validation');
                Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();
                        }
                        form.classList.add('was-validated');
                    }, false);
                });
            }, false);
        })();

        // Add print styles dynamically
        const printStyles = `
            @media print {
                .no-print,
                #scrollToTop,
                .header-navigation,
                .toast-notification {
                    display: none !important;
                }

                .print-break {
                    page-break-before: always;
                }
            }
        `;

        const styleSheet = document.createElement('style');
        styleSheet.textContent = printStyles;
        document.head.appendChild(styleSheet);
    </script>

    <!-- Custom Styles -->
    <style>
        /* Accessibility improvements */
        .skip-to-content {
            position: absolute;
            top: -40px;
            left: 0;
            background: var(--primary-color);
            color: white;
            padding: 8px;
            text-decoration: none;
            z-index: 100000;
        }

        .skip-to-content:focus {
            top: 0;
        }

        /* Visually hidden but accessible */
        .visually-hidden {
            position: absolute !important;
            width: 1px !important;
            height: 1px !important;
            padding: 0 !important;
            margin: -1px !important;
            overflow: hidden !important;
            clip: rect(0, 0, 0, 0) !important;
            white-space: nowrap !important;
            border: 0 !important;
        }

        /* Scroll to Top Button Styles */
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

        .scroll-to-top:focus {
            outline: 2px solid #FFD700;
            outline-offset: 2px;
        }

        /* RTL Support for Scroll Button */
        [dir="rtl"] .scroll-to-top {
            right: auto;
            left: 30px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .scroll-to-top {
                bottom: 20px;
                right: 20px;
                width: 45px;
                height: 45px;
                font-size: 16px;
            }

            [dir="rtl"] .scroll-to-top {
                right: auto;
                left: 20px;
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

            [dir="rtl"] .scroll-to-top {
                right: auto;
                left: 15px;
            }
        }

        /* Performance: Reduce motion for users who prefer it */
        @media (prefers-reduced-motion: reduce) {

            *,
            *::before,
            *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* High contrast mode support */
        @media (prefers-contrast: high) {
            .scroll-to-top {
                border: 2px solid currentColor;
            }
        }

        /* Dark mode support */
        @media (prefers-color-scheme: dark) {
            :root {
                --text-dark: #ffffff;
                --text-light: #2c3e50;
            }
        }
    </style>

    <!-- Schema.org WebPage Markup -->
    {{-- <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "WebPage",
        "@id": "{{ $currentUrl }}#webpage",
        "url": "{{ $currentUrl }}",
        "name": "{{ $isArabic ? 'الصفحة الرئيسية - يونج بوت مايندز' : 'Home - Young Bot Minds' }}",
        "isPartOf": {
            "@id": "{{ url('/') }}#website"
        },
        "about": {
            "@id": "{{ url('/') }}#organization"
        },
        "primaryImageOfPage": {
            "@type": "ImageObject",
            "contentUrl": "{{ asset('img/hero-youngbotminds.jpg') }}"
        },
        "datePublished": "2024-01-01T08:00:00+03:00",
        "dateModified": "{{ now()->toIso8601String() }}",
        "breadcrumb": {
            "@id": "{{ $currentUrl }}#breadcrumb"
        },
        "inLanguage": "{{ $currentLang == 'ar' ? 'ar-LB' : 'en-US' }}",
        "potentialAction": [{
            "@type": "ReadAction",
            "target": ["{{ $currentUrl }}"]
        }],
    }
    </script> --}}
</body>

</html>
