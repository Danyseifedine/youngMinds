<!-- learning part start-->
<section id="about" class="learning_part">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-7">
                <div class="learning_img">
                    @if($section7['image'])
                        <img src="{{ $section7['image'] }}" alt="{{ $section7['title'] }}">
                    @else
                        <img src="img/learning_img.png" alt="">
                    @endif
                </div>
            </div>
            <div class="col-md-5 col-lg-5" data-aos="fade-right">
                <div class="learning_member_text">
                    <h5>{{ $section7['heading'] }}</h5>
                    <h2>{{ $section7['title'] }}</h2>
                    </h2>
                    <p>{{ $section7['text'] }}</p>
                    <ul>
                        <li><span class="fas fa-pencil-alt"></span>{{ $section7['point_1'] }}</li>
                        <li><span class="fas fa-ruler"></span>{{ $section7['point_2'] }}</li>
                    </ul>
                    <a href="{{ route('registration.form') }}" class="btn_1">{{ $section7['cta_button_text'] }}</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- learning part end-->
