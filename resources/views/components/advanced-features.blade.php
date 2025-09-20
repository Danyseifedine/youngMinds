<!-- learning part start-->
<section class="advance_feature learning_part" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
    @if (app()->getLocale() === 'ar')
        <style>
            .advance_feature.learning_part .row {
                flex-direction: row-reverse !important;
            }

            .advance_feature.learning_part .learning_member_text {
                text-align: right !important;
            }

            .advance_feature.learning_part .learning_member_text h2,
            .advance_feature.learning_part .learning_member_text h4,
            .advance_feature.learning_part .learning_member_text h5,
            .advance_feature.learning_part .learning_member_text p {
                font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif !important;
                direction: rtl !important;
            }

            .advance_feature.learning_part .learning_member_text_iner {
                text-align: right !important;
            }

            .advance_feature.learning_part .learning_member_text_iner h4,
            .advance_feature.learning_part .learning_member_text_iner p {
                font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif !important;
                direction: rtl !important;
            }

            /* Responsive spacing adjustments */
            @media (max-width: 768px) {
                .advance_feature.learning_part .learning_img {
                    padding-right: 0 !important;
                    padding-left: 0 !important;
                    margin-bottom: 20px;
                    position: relative !important;
                    left: 0 !important;
                    right: 0 !important;
                    top: 0 !important;
                    bottom: 0 !important;
                    text-align: center !important;
                    display: flex !important;
                    justify-content: center !important;
                    align-items: center !important;
                }

                .advance_feature.learning_part .learning_img img {
                    max-width: 100% !important;
                    height: auto !important;
                    margin: 0 auto !important;
                }

                .advance_feature.learning_part .learning_member_text {
                    padding-left: 0 !important;
                    padding-right: 0 !important;
                }
            }

            @media (min-width: 769px) {
                .advance_feature.learning_part .learning_img {
                    padding-right: 20px !important;
                }

                .advance_feature.learning_part .learning_member_text {
                    padding-left: 20px !important;
                }
            }

            /* Move the background shape more to the left */
            .advance_feature.learning_part .learning_img {
                right: -40px !important;
                left: -40px !important;
            }
        </style>
    @endif
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch">
            @if (app()->getLocale() === 'ar')
                <!-- RTL Layout: Image first, then text -->
                <div class="col-lg-6 col-md-6 mb-4 mb-lg-0">
                    <div class="learning_img" style="padding-right: 20px;">
                        @if ($section9['image'])
                            <img src="{{ $section9['image'] }}" alt="{{ $section9['title'] }}" class="img-fluid"
                                style="max-width: 100%; height: auto;">
                        @else
                            <img src="{{ asset('img/advance_feature_img.png') }}" alt="" class="img-fluid"
                                style="max-width: 100%; height: auto;">
                        @endif
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="learning_member_text" style="text-align: right; padding-left: 20px;">
                        <h5 style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                            {{ $section9['heading'] }}</h5>
                        <h2 style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                            {{ $section9['title'] }}</h2>
                        <p style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                            {{ $section9['text'] }}</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner" style="text-align: right;">
                                    <span class="fas fa-pencil-alt"></span>
                                    <h4 style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                                        {{ $section9['point_1_title'] }}</h4>
                                    <p style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                                        {{ $section9['point_1_description'] }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6">
                                <div class="learning_member_text_iner" style="text-align: right;">
                                    <span class="fas fa-certificate"></span>
                                    <h4 style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                                        {{ $section9['point_2_title'] }}</h4>
                                    <p style="font-family: 'Cairo', 'Tajawal', 'Arial', sans-serif; direction: rtl;">
                                        {{ $section9['point_2_description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <!-- LTR Layout: Text first, then image -->
                <div class="col-md-6 col-lg-6 mb-4 mb-lg-0">
                    <div class="learning_member_text" style="padding-right: 20px;">
                        <h5>{{ $section9['heading'] }}</h5>
                        <h2>{{ $section9['title'] }}</h2>
                        <p>{{ $section9['text'] }}</p>
                        <div class="row">
                            <div class="col-sm-6 col-md-12 col-lg-6 mb-3">
                                <div class="learning_member_text_iner">
                                    <span class="fas fa-pencil-alt"></span>
                                    <h4>{{ $section9['point_1_title'] }}</h4>
                                    <p>{{ $section9['point_1_description'] }}</p>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-12 col-lg-6 mb-3">
                                <div class="learning_member_text_iner">
                                    <span class="fas fa-certificate"></span>
                                    <h4>{{ $section9['point_2_title'] }}</h4>
                                    <p>{{ $section9['point_2_description'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="learning_img" style="padding-left: 20px;">
                        @if ($section9['image'])
                            <img src="{{ $section9['image'] }}" alt="{{ $section9['title'] }}" class="img-fluid"
                                style="max-width: 100%; height: auto;">
                        @else
                            <img src="{{ asset('img/advance_feature_img.png') }}" alt="" class="img-fluid"
                                style="max-width: 100%; height: auto;">
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>
<!-- learning part end-->
