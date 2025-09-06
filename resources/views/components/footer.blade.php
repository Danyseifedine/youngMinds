<!-- footer part start-->
<footer id="contact" class="footer-area">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-sm-6 col-md-4 col-xl-4 text-center">
                <img class="mb-5" src="{{ asset('img/logo_no_bg.png') }}" alt="YoungBotMinds"
                    style="width: 230px; height: 120px;">
            </div>
            <div class="col-sm-6 col-md-4 col-xl-4">
                <div class="single-footer-widget footer_2">
                    <h4>{{ $section10['title'] }}</h4>
                    <p>
                        {{ $section10['text'] }}
                    </p>
                    </p>
                    <div class="social_icon">
                        @php
                            $socialLinks = \App\Models\SocialLink::active()->ordered()->get();
                        @endphp

                        @if ($socialLinks->count() > 0)
                            @foreach ($socialLinks as $link)
                                <a href="{{ $link->url }}" style="font-size: 18px;" target="_blank">
                                    <i class="{{ $link->icon }}"></i>
                                </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6 col-md-4">
                <div class="single-footer-widget footer_2">
                    <h4>Contact us</h4>
                    <div class="contact_info">
                        @php
                            $contactInfo = \App\Models\ContactInfo::active()->get();
                        @endphp

                        @if ($contactInfo->count() > 0)
                            @foreach ($contactInfo as $info)
                                <p><span>{{ ucfirst($info->key) }} :</span> {{ $info->value }}</p>
                            @endforeach
                        @else
                            <p><span> Address :</span> Young Minds Tech Center, Innovation District </p>
                            <p><span> Phone :</span> +1 234 567 (8900)</p>
                            <p><span> Email : </span>info@youngminds.tech </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="copyright_part_text text-center">
                    <div class="row">
                        <div class="col-lg-12">
                            <p class="footer-text m-0">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Powered by Lebify <i class="fas fa-heart"
                                    aria-hidden="true"></i>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer part end-->
