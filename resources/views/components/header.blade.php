@props(['showMenu' => true])

<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar {{ $showMenu ? '' : 'justify-content-center' }} navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="{{ route('welcome') }}">
                        <span style="color: #FFCA4C;">
                            <img src="{{ asset('img/logo_no_bg.png') }}" alt="YoungBotMinds" style="width: 130px; height: 60px;">
                        </span>
                    </a>
                    @if ($showMenu)
                        <!-- Burger only on mobile -->
                        <button class="navbar-toggler d-lg-none" type="button" aria-label="Open navigation" id="customBurger">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Normal menu for desktop -->
                        <div class="collapse navbar-collapse justify-content-end d-none d-lg-flex" id="mainNavbar">
                            <ul class="navbar-nav mb-2 mb-lg-0 align-items-lg-center" style="gap: 0.5rem;">
                                <li class="nav-item active">
                                    <a class="nav-link" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#features">Features</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#stats">Our Impact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact</a>
                                </li>
                                <li class="nav-item ms-lg-3">
                                    <a class="btn_1" href="{{ route('registration.form') }}">Join Now</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Fullpage mobile menu overlay -->
                        <div id="mobileFullMenu" class="mobile-fullpage-menu-overlay d-lg-none">
                            <div class="mobile-fullpage-menu-content">
                                <button type="button" class="close-mobile-fullpage-menu" id="closeMobileFullMenu" aria-label="Close menu">
                                    &times;
                                </button>
                                <ul class="navbar-nav flex-column align-items-center justify-content-center" style="gap: 2rem; font-size: 2rem;">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#home">Home</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#about">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#features">Features</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#stats">Our Impact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#contact">Contact</a>
                                    </li>
                                    <li>
                                        <a class="btn_1" href="{{ route('registration.form') }}">Join Now</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <style>
                            /* Desktop menu right-aligned */
                            @media (min-width: 992px) {
                                .navbar-toggler {
                                    display: none !important;
                                }
                                .navbar-collapse {
                                    display: flex !important;
                                    justify-content: flex-end !important;
                                }
                                .navbar-nav {
                                    flex-direction: row !important;
                                    gap: 0.5rem;
                                }
                                .navbar-nav .nav-item {
                                    margin-left: 0.5rem;
                                    margin-right: 0.5rem;
                                }
                                .navbar-nav .btn_1 {
                                    margin-left: 1rem;
                                }
                            }
                            /* Mobile fullpage menu overlay */
                            .mobile-fullpage-menu-overlay {
                                position: fixed;
                                top: 0;
                                left: 0;
                                width: 100vw;
                                height: 100vh;
                                background: rgba(255,255,255,0.98);
                                z-index: 2000;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                opacity: 0;
                                pointer-events: none;
                                transition: opacity 0.4s cubic-bezier(0.4,0,0.2,1);
                            }
                            .mobile-fullpage-menu-overlay.active {
                                opacity: 1;
                                pointer-events: auto;
                            }
                            .mobile-fullpage-menu-content {
                                width: 100vw;
                                height: 100vh;
                                display: flex;
                                flex-direction: column;
                                align-items: center;
                                justify-content: center;
                                position: relative;
                                animation: slideDownMenu 0.45s cubic-bezier(0.4,0,0.2,1);
                            }
                            @keyframes slideDownMenu {
                                0% {
                                    transform: translateY(-40px);
                                    opacity: 0;
                                }
                                100% {
                                    transform: translateY(0);
                                    opacity: 1;
                                }
                            }
                            .mobile-fullpage-menu-overlay ul li a {
                                color: #333;
                                font-weight: 600;
                                transition: color 0.2s;
                            }
                            .mobile-fullpage-menu-overlay ul li a:hover {
                                color: #FFCA4C;
                            }
                            .close-mobile-fullpage-menu {
                                position: absolute;
                                top: 30px;
                                right: 40px;
                                background: none;
                                border: none;
                                font-size: 2.5rem;
                                color: #333;
                                z-index: 1002;
                                transition: color 0.2s;
                            }
                            .close-mobile-fullpage-menu:hover {
                                color: #FFCA4C;
                            }
                            @media (max-width: 768px) {
                                .mobile-fullpage-menu-content ul {
                                    font-size: 1.5rem !important;
                                }
                                .close-mobile-fullpage-menu {
                                    top: 20px !important;
                                    right: 20px !important;
                                    font-size: 2rem !important;
                                }
                            }
                            @media (min-width: 992px) {
                                .mobile-fullpage-menu-overlay {
                                    display: none !important;
                                }
                            }
                        </style>
                        <script>
                            document.addEventListener('DOMContentLoaded', function () {
                                var burger = document.getElementById('customBurger');
                                var menu = document.getElementById('mobileFullMenu');
                                var closeBtn = document.getElementById('closeMobileFullMenu');
                                if (burger && menu && closeBtn) {
                                    burger.addEventListener('click', function () {
                                        menu.classList.add('active');
                                        document.body.style.overflow = 'hidden';
                                    });
                                    closeBtn.addEventListener('click', function () {
                                        menu.classList.remove('active');
                                        document.body.style.overflow = '';
                                    });
                                    // Close menu when clicking a link
                                    var navLinks = menu.querySelectorAll('.nav-link, .btn_1');
                                    navLinks.forEach(function(link) {
                                        link.addEventListener('click', function() {
                                            menu.classList.remove('active');
                                            document.body.style.overflow = '';
                                        });
                                    });
                                }
                            });
                        </script>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->
