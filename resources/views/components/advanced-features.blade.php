<!-- learning part start-->
<section class="advance_feature learning_part">
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch">
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text">
                    <h5>{{ $section9['heading'] }}</h5>
                    <h2>{{ $section9['title'] }}</h2>
                    </h2>
                    <p>{{ $section9['text'] }}</p>
                    <div class="row">
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <div class="learning_member_text_iner">
                                <span class="fas fa-pencil-alt"></span>
                                <h4>{{ $section9['point_1_title'] }}</h4>
                                <p>{{ $section9['point_1_description'] }}</p>
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
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
                <div class="learning_img">
                    @if($section9['image'])
                        <img src="{{ $section9['image'] }}" alt="{{ $section9['title'] }}">
                    @else
                        <img src="img/advance_feature_img.png" alt="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- learning part end-->
