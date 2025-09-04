<!-- Students Gallery Section -->
<section id="students-gallery" class="py-5" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="container">
        <!-- Section Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <div class="section-header mb-4">
                    <span class="display-5 mb-3" style="color: #FFCA4C;">
                        <i class="fas fa-user-graduate"></i>
                    </span>
                    <h2 class="fw-bold mb-3" style="color: #333; font-size: clamp(2rem, 5vw, 3rem);">
                        Our Amazing <span style="color: #FFCA4C;">Students</span>
                    </h2>
                    <div class="title-underline mx-auto mb-4"
                        style="width: 80px; height: 4px; background: linear-gradient(90deg, #FFCA4C, #FFD700); border-radius: 2px;">
                    </div>
                    <p class="lead" style="color: #666; font-size: 1.1rem; line-height: 1.7;">
                        Meet the brilliant young minds who have mastered robotics and coding through our innovative
                        programs.
                    </p>
                </div>
            </div>
        </div>

        @php
            $studentImages = \App\Models\StudentImage::with('attachment')->active()->ordered()->get();
            $hasImages = $studentImages->count() > 0;
        @endphp

        <!-- Students Image Gallery -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="students-gallery">
                    @if ($hasImages)
                        <div class="gallery-grid">
                            @foreach ($studentImages as $studentImage)
                                <div class="gallery-item">
                                    @php
                                        $attachment = $studentImage->attachment->first();
                                    @endphp

                                    @if ($attachment)
                                        <div class="student-image-wrapper">
                                            <img src="{{ $attachment->url() }}"
                                                alt="{{ $studentImage->title ?: 'Student Image' }}"
                                                class="student-image" loading="lazy">

                                            <!-- Student Name Title (slides up from bottom) -->
                                            <div class="student-name-title">
                                                {{ $studentImage->title ?: 'Student' }}
                                            </div>
                                        </div>
                                    @else
                                        <div class="student-image-wrapper placeholder">
                                            <div class="placeholder-icon">
                                                <i class="fas fa-user-graduate"></i>
                                            </div>

                                            <!-- Student Name Title (slides up from bottom) -->
                                            <div class="student-name-title">
                                                {{ $studentImage->title ?: 'Student' }}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    @else
                        <!-- Sample Images when no students in database -->
                        <div class="gallery-grid">
                            @for ($i = 1; $i <= 6; $i++)
                                <div class="gallery-item">
                                    <div class="student-image-wrapper placeholder">
                                        <div class="placeholder-icon">
                                            <i class="fas fa-user-graduate"></i>
                                        </div>

                                        <!-- Student Name Title (slides up from bottom) -->
                                        <div class="student-name-title">
                                            Sample Student {{ $i }}
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Initialize Image Gallery
    document.addEventListener('DOMContentLoaded', function() {
        // Add hover effects to gallery images
        const galleryItems = document.querySelectorAll('.gallery-item');

        galleryItems.forEach(item => {
            const imageWrapper = item.querySelector('.student-image-wrapper');
            const image = item.querySelector('.student-image');

            if (imageWrapper) {
                imageWrapper.addEventListener('mouseenter', function() {
                    this.style.transform = 'scale(1.05)';
                    this.style.boxShadow = '0 25px 60px rgba(255, 202, 76, 0.3)';

                    if (image) {
                        image.style.transform = 'scale(1.1)';
                    }
                });

                imageWrapper.addEventListener('mouseleave', function() {
                    this.style.transform = 'scale(1)';
                    this.style.boxShadow = '0 15px 40px rgba(0, 0, 0, 0.1)';

                    if (image) {
                        image.style.transform = 'scale(1)';
                    }
                });
            }
        });

        // Add click functionality to open images in lightbox (optional)
        galleryItems.forEach(item => {
            const image = item.querySelector('.student-image');
            if (image) {
                image.addEventListener('click', function() {
                    // You can add lightbox functionality here if needed
                    console.log('Image clicked:', this.src);
                });
            }
        });
    });
</script>

<style>
    /* Students Gallery Styles */
    .students-gallery {
        padding: 20px 0;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 25px;
        padding: 20px 0;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 20px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-item:hover {
        transform: translateY(-10px);
        box-shadow: 0 25px 60px rgba(255, 202, 76, 0.2);
    }

    .student-image-wrapper {
        position: relative;
        width: 100%;
        height: 250px;
        overflow: hidden;
        border-radius: 20px;
        background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        border: 3px solid transparent;
        transition: all 0.4s ease;
    }

    .student-image-wrapper:hover {
        border-color: #FFCA4C;
    }

    .student-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: all 0.6s ease;
        filter: grayscale(100%);
    }

    .student-image-wrapper:hover .student-image {
        filter: grayscale(0%);
    }

    .student-image-wrapper.placeholder {
        background: linear-gradient(135deg, #FFCA4C, #FFD700);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .placeholder-icon {
        font-size: 60px;
        color: white;
        text-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    /* Student Name Title */
    .student-name-title {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(135deg, rgba(255, 202, 76, 0.95), rgba(255, 215, 0, 0.95));
        color: white;
        padding: 15px 20px;
        text-align: center;
        font-size: 1.1rem;
        font-weight: bold;
        transform: translateY(100%);
        transition: transform 0.4s ease;
        border-radius: 0 0 20px 20px;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
    }

    .student-image-wrapper:hover .student-name-title {
        transform: translateY(0%);
    }



    /* Responsive Design */
    @media (max-width: 768px) {
        .gallery-grid {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
        }

        .student-image-wrapper {
            height: 200px;
        }

        .student-name {
            font-size: 1rem;
        }

        .certification-badge {
            font-size: 0.7rem;
            padding: 6px 12px;
        }
    }

    @media (max-width: 480px) {
        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }

        .student-image-wrapper {
            height: 150px;
        }

        .placeholder-icon {
            font-size: 40px;
        }
    }
</style>
