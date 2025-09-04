<!-- Events & Workshops Section -->
<section id="events-workshops" class="py-5" style="background: #f8f9fa; position: relative;">

    <div class="container position-relative" style="z-index: 2;">
        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <div class="section-header mb-4">
                    <span class="display-5 mb-3" style="color: #FFCA4C;">
                        <i class="fas fa-calendar-alt"></i>
                    </span>
                    <h2 class="fw-bold mb-3" style="color: #333; font-size: clamp(2rem, 5vw, 3rem);">
                        Upcoming <span style="color: #FFCA4C;">Events</span> & Workshops
                    </h2>
                    <div class="title-underline mx-auto mb-4"
                        style="width: 80px; height: 4px; background: linear-gradient(90deg, #FFCA4C, #FFD700); border-radius: 2px;">
                    </div>
                    <p class="lead mb-5" style="color: #666; font-size: clamp(1rem, 2.5vw, 1.1rem); line-height: 1.7;">
                        Join our exciting workshops and events designed to inspire creativity and learning in robotics
                        and coding.
                    </p>
                </div>
            </div>
        </div>

        @php
            $events = \App\Models\Event::active()->orderBy('start_date')->get();
            $hasEvents = $events->count() > 0;
        @endphp

        <!-- Events Carousel Container -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="carousel-container">
                    <div class="swiper events-swiper">
                        <div class="swiper-wrapper">
                            @if ($hasEvents)
                                @foreach ($events as $event)
                                    <div class="swiper-slide">
                                        <div class="event-card-wrapper">
                                            <div class="event-card">
                                                <div class="card-header">
                                                    <span
                                                        class="event-badge {{ strtolower(str_replace(' ', '-', $event->type ?: 'workshop')) }}">
                                                        {{ $event->type ?: 'Workshop' }}
                                                    </span>
                                                    <span class="event-date-badge">
                                                        <i class="far fa-calendar"></i>
                                                        {{ $event->start_date ? \Carbon\Carbon::parse($event->start_date)->format('M d') : 'TBA' }}
                                                    </span>
                                                </div>

                                                <div class="card-icon">
                                                    <div
                                                        class="icon-bg {{ strtolower(str_replace(' ', '-', $event->type ?: 'workshop')) }}-bg">
                                                        @if (stripos($event->type, 'robotics') !== false)
                                                            <i class="fas fa-robot"></i>
                                                        @elseif(stripos($event->type, 'coding') !== false || stripos($event->type, 'programming') !== false)
                                                            <i class="fas fa-code"></i>
                                                        @elseif(stripos($event->type, 'workshop') !== false)
                                                            <i class="fas fa-tools"></i>
                                                        @elseif(stripos($event->type, 'ai') !== false || stripos($event->type, 'ml') !== false)
                                                            <i class="fas fa-brain"></i>
                                                        @elseif(stripos($event->type, 'game') !== false)
                                                            <i class="fas fa-gamepad"></i>
                                                        @else
                                                            <i class="fas fa-calendar-check"></i>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <h4>{{ $event->title }}</h4>
                                                    <p class="card-description">
                                                        {{ $event->description ?: 'Join us for an exciting learning experience that will enhance your skills and creativity!' }}
                                                    </p>

                                                    <div class="event-meta">
                                                        <div class="meta-item">
                                                            <i class="far fa-clock"></i>
                                                            <span>
                                                                @if ($event->start_date && $event->end_date)
                                                                    {{ \Carbon\Carbon::parse($event->start_date)->diffInDays(\Carbon\Carbon::parse($event->end_date)) + 1 }}
                                                                    {{ \Carbon\Carbon::parse($event->start_date)->diffInDays(\Carbon\Carbon::parse($event->end_date)) > 0 ? 'Days' : 'Day' }}
                                                                @else
                                                                    Duration TBA
                                                                @endif
                                                            </span>
                                                        </div>
                                                        <div class="meta-item">
                                                            <i class="far fa-user"></i>
                                                            <span>All Ages</span>
                                                        </div>
                                                    </div>

                                                    @if ($event->location)
                                                        <div class="event-location">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            <span>{{ $event->location }}</span>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>

                    <!-- Navigation Buttons -->
                    <div class="swiper-nav-wrapper">
                        <button class="swiper-nav-btn swiper-button-next">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Required Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const eventsSwiper = new Swiper('.events-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true
            },
            navigation: {
                nextEl: '.swiper-button-next',
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 40,
                }
            },
            effect: 'coverflow',
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            watchOverflow: true,
            preventClicks: false,
            preventClicksPropagation: false
        });

        // Pause on hover
        const swiperContainer = document.querySelector('.events-swiper');
        swiperContainer.addEventListener('mouseenter', () => eventsSwiper.autoplay.stop());
        swiperContainer.addEventListener('mouseleave', () => eventsSwiper.autoplay.start());
    });
</script>

<style>
    /* Section Background */
    #events-workshops {
        padding: 80px 0;
        position: relative;
        background: #f8f9fa;
    }

    /* Header Styles */
    .title-underline {
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #FFCA4C, #FFD700);
        border-radius: 2px;
        margin: 0 auto;
    }

    /* Carousel Container */
    .carousel-container {
        position: relative;
        padding: 0 60px;
        overflow: hidden;
    }

    .events-swiper {
        padding: 20px 0 60px 0;
        overflow: visible !important;
    }

    /* Event Card Styles */
    .event-card-wrapper {
        height: 100%;
        padding: 10px;
        box-sizing: border-box;
    }

    .swiper-slide {
        box-sizing: border-box;
    }

    .event-card {
        background: white;
        border-radius: 25px;
        overflow: hidden;
        height: 500px;
        display: flex;
        flex-direction: column;
        position: relative;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .event-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
    }

    .event-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: linear-gradient(90deg, #FFCA4C, #FFD700);
    }

    /* Card Header */
    .card-header {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .event-badge {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .event-badge.coding {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
    }

    .event-badge.workshop {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
    }

    .event-date-badge {
        color: #666;
        font-size: 0.9rem;
        font-weight: 500;
    }

    .event-date-badge i {
        margin-right: 5px;
        color: #FFCA4C;
    }

    /* Card Icon */
    .card-icon {
        text-align: center;
        margin: 10px 0 20px 0;
    }

    .icon-bg {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
        border-radius: 25px;
        color: white;
        font-size: 2rem;
        box-shadow: 0 10px 30px rgba(255, 202, 76, 0.3);
        transition: transform 0.3s ease;
    }

    .icon-bg.coding-bg {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
        box-shadow: 0 10px 30px rgba(255, 202, 76, 0.3);
    }

    .icon-bg.workshop-bg {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
        box-shadow: 0 10px 30px rgba(255, 202, 76, 0.3);
    }

    .event-card:hover .icon-bg {
        transform: rotate(10deg) scale(1.1);
    }

    /* Card Body */
    .card-body {
        flex: 1;
        padding: 0 25px 20px 25px;
        display: flex;
        flex-direction: column;
    }

    .card-body h4 {
        color: #2c3e50;
        font-size: 1.4rem;
        font-weight: 700;
        margin-bottom: 15px;
        line-height: 1.3;
    }

    .card-description {
        color: #666;
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 20px;
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        flex: 1;
    }

    .event-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 20px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #777;
        font-size: 0.9rem;
    }

    .meta-item i {
        color: #FFCA4C;
        font-size: 1rem;
    }

    .event-location {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #555;
        font-size: 0.9rem;
        padding-top: 15px;
        border-top: 1px solid #eee;
        margin-top: auto;
        padding-bottom: 15px;
    }

    .event-location i {
        color: #667eea;
        font-size: 1rem;
    }

    /* Additional event badge styles */
    .event-badge.ai-&-ml {
        background: linear-gradient(135deg, #9b59b6, #8e44ad);
    }

    .event-badge.game-dev {
        background: linear-gradient(135deg, #e74c3c, #c0392b);
    }

    /* Navigation Buttons */
    .swiper-nav-wrapper {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 100%;
        display: flex;
        justify-content: space-between;
        pointer-events: none;
        z-index: 10;
    }

    .swiper-nav-btn {
        width: 50px;
        height: 50px;
        background: white;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #FFCA4C;
        font-size: 1.2rem;
        cursor: pointer;
        pointer-events: all;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .swiper-nav-btn:hover {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
        color: white;
        transform: scale(1.1);
        box-shadow: 0 8px 30px rgba(255, 202, 76, 0.4);
    }

    .swiper-button-prev {
        margin-left: -25px;
    }

    .swiper-button-next {
        margin-right: -25px;
    }

    /* Pagination */
    .swiper-pagination {
        bottom: 0 !important;
    }

    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 1;
        transition: all 0.3s ease;
    }

    .swiper-pagination-bullet-active {
        width: 35px;
        border-radius: 6px;
        background: linear-gradient(90deg, #FFCA4C, #FFD700);
    }

    /* Responsive Design */
    @media (max-width: 1024px) {
        .carousel-container {
            padding: 0 40px;
        }

        .event-card {
            height: 480px;
        }
    }

    @media (max-width: 768px) {
        #events-workshops {
            padding: 60px 0;
        }

        .carousel-container {
            padding: 0 20px;
        }

        .swiper-nav-wrapper {
            display: none;
        }

        .event-card {
            height: 460px;
        }

        .card-body h4 {
            font-size: 1.2rem;
        }

        .event-card-wrapper {
            padding: 5px;
        }
    }

    @media (max-width: 480px) {
        .event-card {
            height: 440px;
        }

        .carousel-container {
            padding: 0 15px;
        }

        .icon-bg {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .card-header {
            padding: 15px;
        }

        .card-body {
            padding: 0 15px;
        }

        .event-card-wrapper {
            padding: 3px;
        }
    }
</style>
