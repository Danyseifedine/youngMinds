<!-- banner part start-->
<section id="home" class="banner_part mb-12" @if($section1['image']) style="position: relative;" @endif>
    @if($section1['image'])
    <style>
        .banner_part:after {
            background-image: url('{{ $section1['image'] }}') !important;
        }
    </style>
    @endif
    <div class="container">
        <div class="row align-items-center min-vh-100">
            <div class="col-lg-6 col-xl-6 col-md-12 col-sm-12">
                <div class="banner_text" style="">
                    <div class="banner_text_iner">
                        <h5 class="hero-subtitle" data-aos="fade-up" data-aos-delay="200">{{ $section1['subtitle'] }}
                        </h5>
                        <h1 class="hero-title" data-aos="fade-up" data-aos-delay="400">{{ $section1['title'] }}</h1>
                        <p class="hero-description" data-aos="fade-up" data-aos-delay="600">
                            {{ $section1['description'] }}</p>
                        <div class="hero-buttons" data-aos="fade-up" data-aos-delay="800">
                            <a href="{{ route('registration.form') }}" class="btn_1">{{ $section1['cta_button_text'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- banner part end-->
