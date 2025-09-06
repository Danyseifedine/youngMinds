<!-- feature_part start-->
<section id="features" class="feature_part">
    <div class="container">
        <div class="row align-items-center gap-12">
            <!-- Left Column - Content -->
            <div class="col-lg-6 col-md-12 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="single_feature_text h-100 d-flex flex-column justify-content-center">
                    <div class="text-center mb-4">
                        <span class="display-4 display-lg-2" style="color: #FFCA4C;"><i class="fas fa-robot"></i></span>
                        <h2 class="mt-3 mb-2 fw-bold" style="color: #FFCA4C; font-size: clamp(2rem, 4vw, 2.5rem);">
                            {{ $section2['title'] }}</h2>
                        <p class="lead text-muted mb-0">{{ $section2['subtitle'] }}</p>
                    </div>

                    <div class="mb-3 mb-md-4">
                        <h5 class="fw-bold" style="color: #FFCA4C; font-size: clamp(1rem, 2.5vw, 1.1rem);">
                            <i class="fas fa-users mr-2 me-2"></i>{{ $section2['who_we_are_title'] }}
                        </h5>
                        <p class="mb-0" style="font-size: clamp(0.9rem, 2vw, 0.95rem); line-height: 1.6;">
                            {{ $section2['who_we_are_text'] }}
                        </p>
                    </div>

                    <div class="mb-3 mb-md-4">
                        <h5 class="fw-bold" style="color: #FFCA4C; font-size: clamp(1rem, 2.5vw, 1.1rem);">
                            <i class="fas fa-bullseye mr-2 me-2"></i>{{ $section2['mission_title'] }}
                        </h5>
                        <p class="mb-0" style="font-size: clamp(0.9rem, 2vw, 0.95rem); line-height: 1.6;">
                            {{ $section2['mission_text'] }}
                        </p>
                    </div>

                    <div class="mb-4 mb-md-5">
                        <h5 class="fw-bold" style="color: #FFCA4C; font-size: clamp(1rem, 2.5vw, 1.1rem);">
                            <i class="fas fa-eye mr-2 me-2"></i>{{ $section2['vision_title'] }}
                        </h5>
                        <p class="mb-0" style="font-size: clamp(0.9rem, 2vw, 0.95rem); line-height: 1.6;">
                            {{ $section2['vision_text'] }}
                        </p>
                    </div>

                    <div class="text-center mt-auto">
                        <a href="{{ route('registration.form') }}" class="btn_1 btn-lg px-4 py-3"
                            style="font-size: clamp(0.9rem, 2.5vw, 1rem); min-width: 200px;">
                            {{ $section2['cta_text'] }}
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column - Feature Cards -->
            <div class="col-lg-6 col-md-12">
                <div class="row g-12 g-md-5">
                    <!-- Feature Card 1 -->
                    <div class="col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="single_feature h-100">
                            <div class="single_feature_part text-center p-3 p-md-4 h-100 d-flex flex-column"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
                                       border-radius: 20px;
                                       box-shadow: 0 8px 25px rgba(255, 202, 76, 0.15);
                                       border: 2px solid transparent;
                                       transition: all 0.3s ease;
                                       min-height: 250px;
                                       cursor: pointer;">
                                <div class="feature-icon-wrapper mb-3"
                                    style="background: linear-gradient(135deg, #FFCA4C, #FFD700);
                                           width: clamp(60px, 15vw, 80px);
                                           height: clamp(60px, 15vw, 80px);
                                           border-radius: 50%;
                                           margin: 0 auto;
                                           display: flex;
                                           align-items: center;
                                           justify-content: center;
                                           box-shadow: 0 8px 25px rgba(255, 202, 76, 0.3);">
                                    <i class="fas fa-lightbulb"
                                        style="font-size: clamp(25px, 6vw, 35px); color: white;"></i>
                                </div>
                                <h4 class="mb-3 fw-bold" style="color: #333; font-size: clamp(1rem, 3vw, 1.2rem);">
                                    {{ $section2['feature1_title'] }}
                                </h4>
                                <p class="flex-grow-1 mb-0"
                                    style="color: #666; line-height: 1.6; font-size: clamp(0.8rem, 2.5vw, 0.9rem);">
                                    {{ $section2['feature1_text'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 2 -->
                    <div class="col-md-6 col-sm-6 col-12 mt-md-0 mt-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="single_feature h-100">
                            <div class="single_feature_part text-center p-3 p-md-4 h-100 d-flex flex-column"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
                                       border-radius: 20px;
                                       box-shadow: 0 8px 25px rgba(255, 202, 76, 0.15);
                                       border: 2px solid transparent;
                                       transition: all 0.3s ease;
                                       min-height: 250px;
                                       cursor: pointer;">
                                <div class="feature-icon-wrapper mb-3"
                                    style="background: linear-gradient(135deg, #FFCA4C, #FFD700);
                                           width: clamp(60px, 15vw, 80px);
                                           height: clamp(60px, 15vw, 80px);
                                           border-radius: 50%;
                                           margin: 0 auto;
                                           display: flex;
                                           align-items: center;
                                           justify-content: center;
                                           box-shadow: 0 8px 25px rgba(255, 202, 76, 0.3);">
                                    <i class="fas fa-users"
                                        style="font-size: clamp(25px, 6vw, 35px); color: white;"></i>
                                </div>
                                <h4 class="mb-3 fw-bold" style="color: #333; font-size: clamp(1rem, 3vw, 1.2rem);">
                                    {{ $section2['feature2_title'] }}
                                </h4>
                                <p class="flex-grow-1 mb-0"
                                    style="color: #666; line-height: 1.6; font-size: clamp(0.8rem, 2.5vw, 0.9rem);">
                                    {{ $section2['feature2_text'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 3 -->
                    <div class="col-md-6 col-sm-6 col-12 mt-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="single_feature h-100">
                            <div class="single_feature_part text-center p-3 p-md-4 h-100 d-flex flex-column"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
                                       border-radius: 20px;
                                       box-shadow: 0 8px 25px rgba(255, 202, 76, 0.15);
                                       border: 2px solid transparent;
                                       transition: all 0.3s ease;
                                       min-height: 250px;
                                       cursor: pointer;">
                                <div class="feature-icon-wrapper mb-3"
                                    style="background: linear-gradient(135deg, #FFCA4C, #FFD700);
                                           width: clamp(60px, 15vw, 80px);
                                           height: clamp(60px, 15vw, 80px);
                                           border-radius: 50%;
                                           margin: 0 auto;
                                           display: flex;
                                           align-items: center;
                                           justify-content: center;
                                           box-shadow: 0 8px 25px rgba(255, 202, 76, 0.3);">
                                    <i class="fas fa-gamepad"
                                        style="font-size: clamp(25px, 6vw, 35px); color: white;"></i>
                                </div>
                                <h4 class="mb-3 fw-bold" style="color: #333; font-size: clamp(1rem, 3vw, 1.2rem);">
                                    {{ $section2['feature3_title'] }}
                                </h4>
                                <p class="flex-grow-1 mb-0"
                                    style="color: #666; line-height: 1.6; font-size: clamp(0.8rem, 2.5vw, 0.9rem);">
                                    {{ $section2['feature3_text'] }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Feature Card 4 - Added for better grid balance -->
                    <div class="col-md-6 col-sm-6 col-12 mt-4" data-aos="fade-up" data-aos-delay="400">
                        <div class="single_feature h-100">
                            <div class="single_feature_part text-center p-3 p-md-4 h-100 d-flex flex-column"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%);
                                       border-radius: 20px;
                                       box-shadow: 0 8px 25px rgba(255, 202, 76, 0.15);
                                       border: 2px solid transparent;
                                       transition: all 0.3s ease;
                                       min-height: 250px;
                                       cursor: pointer;">
                                <div class="feature-icon-wrapper mb-3"
                                    style="background: linear-gradient(135deg, #FFCA4C, #FFD700);
                                           width: clamp(60px, 15vw, 80px);
                                           height: clamp(60px, 15vw, 80px);
                                           border-radius: 50%;
                                           margin: 0 auto;
                                           display: flex;
                                           align-items: center;
                                           justify-content: center;
                                           box-shadow: 0 8px 25px rgba(255, 202, 76, 0.3);">
                                    <i class="fas fa-rocket"
                                        style="font-size: clamp(25px, 6vw, 35px); color: white;"></i>
                                </div>
                                <h4 class="mb-3 fw-bold" style="color: #333; font-size: clamp(1rem, 3vw, 1.2rem);">
                                    {{ $section2['feature4_title'] }}
                                </h4>
                                <p class="flex-grow-1 mb-0"
                                    style="color: #666; line-height: 1.6; font-size: clamp(0.8rem, 2.5vw, 0.9rem);">
                                    {{ $section2['feature4_text'] }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature_part end-->


