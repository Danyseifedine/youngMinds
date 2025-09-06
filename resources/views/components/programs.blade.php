<!-- Programs & Courses Section -->
<section id="programs-courses" class="programs_courses py-5" style="background: white;">
    <div class="container">
        <!-- Centered Header -->
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 col-md-10 text-center" data-aos="fade-up">
                <div class="section-header mb-4">
                    <span class="display-5 mb-3" style="color: #FFCA4C;"><i class="fas fa-graduation-cap"></i></span>
                    <h2 class="fw-bold" style="color: #333; font-size: clamp(2rem, 5vw, 3rem); margin-bottom: 1rem;">
                        {{ $section4['before_highlighted_word'] }} <span
                            style="color: #FFCA4C;">{{ $section4['highlighted_word'] }}
                        </span>{{ $section4['after_highlighted_word'] }}
                    </h2>
                    <div class="title-underline mx-auto"
                        style="width: 80px; height: 4px; background: linear-gradient(90deg, #FFCA4C, #FFD700); border-radius: 2px;">
                    </div>
                </div>

                <p class="lead mb-5" style="color: #666; font-size: clamp(1rem, 2.5vw, 1.1rem); line-height: 1.7;">
                    {{ $section4['subtitle'] }}
                </p>
            </div>
        </div>

        <!-- Advanced Card Layout Around Central Image -->
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="programs-layout position-relative" style="min-height: 600px;">

                    <!-- Central Image -->
                    <div class="central-image text-center mb-5" data-aos="zoom-in" data-aos-delay="300">
                        <div class="image-placeholder mx-auto"
                            style="width: 300px; height: 300px; background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); border-radius: 50%; border: 4px solid #FFCA4C; display: flex; align-items: center; justify-content: center; flex-direction: column; box-shadow: 0 20px 60px rgba(255, 202, 76, 0.3);">
                            <div class="placeholder-icon mb-3"
                                style="width: 100px; height: 100px; background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(255, 202, 76, 0.3);">
                                <i class="fas fa-robot" style="font-size: 50px; color: white;"></i>
                            </div>
                            <h5 class="fw-bold mb-2" style="color: #333; font-size: clamp(1rem, 2.5vw, 1.2rem);">
                                {{ $section4['badge_title'] }}</h5>
                            <p class="mb-0" style="color: #666; font-size: clamp(0.8rem, 2vw, 0.9rem);">
                                {{ $section4['badge_subtitle'] }}</p>
                        </div>
                    </div>

                    <!-- Course Cards in Triangular Pattern Around Central Image -->
                    <!-- Simple Course Cards Layout -->
                    <div class="row g-4 g-lg-5 justify-content-center">
                        <!-- Course 1: Ages 5-7 -->
                        <div class="col-lg-4 col-md-8" data-aos="fade-up" data-aos-delay="50">
                            <div class="course-card h-100 p-4"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border-radius: 20px; box-shadow: 0 15px 40px rgba(255, 202, 76, 0.15); border: 3px solid transparent; transition: all 0.4s ease; position: relative; overflow: hidden;">
                                <div class="course-content">
                                    <div class="course-icon mb-3 text-center"
                                        style="width: 70px; height: 70px; margin: 0 auto; background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(255, 202, 76, 0.2);">
                                        <i class="fas fa-puzzle-piece" style="font-size: 30px; color: white;"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3 text-center"
                                        style="color: #333; font-size: clamp(1.1rem, 2.5vw, 1.3rem);">
                                        {{ $section4['age_card_1_title'] }}
                                    </h5>
                                    <h6 class="text-center mb-3"
                                        style="color: #FFCA4C; font-size: clamp(1rem, 2.5vw, 1.1rem);">
                                        {{ $section4['age_card_1_subtitle'] }}
                                    </h6>
                                    <ul class="mb-3"
                                        style="color: #666; font-size: clamp(0.85rem, 2vw, 0.95rem); line-height: 1.6;">
                                        <li>{{ $section4['age_card_1_point_1'] }}</li>
                                        <li>{{ $section4['age_card_1_point_2'] }}</li>
                                        <li>{{ $section4['age_card_1_point_3'] }}</li>
                                    </ul>
                                    <div class="outcome-box text-center p-3"
                                        style="background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 15px;">
                                        <p class="mb-0 fw-bold"
                                            style="color: white; font-size: clamp(0.85rem, 2vw, 0.95rem);">
                                            {{ $section4['age_card_1_outcome'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course 2: Ages 8-11 -->
                        <div class="col-lg-4 col-md-8" data-aos="fade-up" data-aos-delay="100">
                            <div class="course-card h-100 p-4"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border-radius: 20px; box-shadow: 0 15px 40px rgba(255, 202, 76, 0.15); border: 3px solid transparent; transition: all 0.4s ease; position: relative; overflow: hidden;">
                                <div class="course-content">
                                    <div class="course-icon mb-3 text-center"
                                        style="width: 70px; height: 70px; margin: 0 auto; background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(255, 202, 76, 0.2);">
                                        <i class="fas fa-cogs" style="font-size: 30px; color: white;"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3 text-center"
                                        style="color: #333; font-size: clamp(1.1rem, 2.5vw, 1.3rem);">
                                        {{ $section4['age_card_2_title'] }}
                                    </h5>
                                    <h6 class="text-center mb-3"
                                        style="color: #FFCA4C; font-size: clamp(1rem, 2.5vw, 1.1rem);">
                                        {{ $section4['age_card_2_subtitle'] }}
                                    </h6>
                                    <ul class="mb-3"
                                        style="color: #666; font-size: clamp(0.85rem, 2vw, 0.95rem); line-height: 1.6;">
                                        <li>{{ $section4['age_card_2_point_1'] }}</li>
                                        <li>{{ $section4['age_card_2_point_2'] }}</li>
                                        <li>{{ $section4['age_card_2_point_3'] }}</li>
                                    </ul>
                                    <div class="outcome-box text-center p-3"
                                        style="background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 15px;">
                                        <p class="mb-0 fw-bold"
                                            style="color: white; font-size: clamp(0.85rem, 2vw, 0.95rem);">
                                            {{ $section4['age_card_2_outcome'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Course 3: Ages 12-14+ -->
                        <div class="col-lg-4 col-md-8" data-aos="fade-up" data-aos-delay="200">
                            <div class="course-card h-100 p-4"
                                style="background: linear-gradient(135deg, #fff 0%, #f8f9fa 100%); border-radius: 20px; box-shadow: 0 15px 40px rgba(255, 202, 76, 0.15); border: 3px solid transparent; transition: all 0.4s ease; position: relative; overflow: hidden;">
                                <div class="course-content">
                                    <div class="course-icon mb-3 text-center"
                                        style="width: 70px; height: 70px; margin: 0 auto; background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 8px 25px rgba(255, 202, 76, 0.2);">
                                        <i class="fas fa-microchip" style="font-size: 30px; color: white;"></i>
                                    </div>
                                    <h5 class="fw-bold mb-3 text-center"
                                        style="color: #333; font-size: clamp(1.1rem, 2.5vw, 1.3rem);">
                                        {{ $section4['age_card_3_title'] }}
                                    </h5>
                                    <h6 class="text-center mb-3"
                                        style="color: #FFCA4C; font-size: clamp(1rem, 2.5vw, 1.1rem);">
                                        {{ $section4['age_card_3_subtitle'] }}
                                    </h6>
                                    <ul class="mb-3"
                                        style="color: #666; font-size: clamp(0.85rem, 2vw, 0.95rem); line-height: 1.6;">
                                        <li>{{ $section4['age_card_3_point_1'] }}</li>
                                        <li>{{ $section4['age_card_3_point_2'] }}</li>
                                        <li>{{ $section4['age_card_3_point_3'] }}</li>
                                    </ul>
                                    <div class="outcome-box text-center p-3"
                                        style="background: linear-gradient(135deg, #FFCA4C, #FFD700); border-radius: 15px;">
                                        <p class="mb-0 fw-bold"
                                            style="color: white; font-size: clamp(0.85rem, 2vw, 0.95rem);">
                                            ` {{ $section4['age_card_3_outcome'] }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Programs & Courses Section end-->
