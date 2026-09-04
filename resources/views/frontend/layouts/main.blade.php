<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('meta_title', ($settings['general']['site_name'] ?? 'Western Partners Marine Services') . ' - Ship Chandlery & Marine Services')</title>
    <meta name="description" content="@yield('meta_description', 'Professional ship chandlery and marine servicing company operating through a large network of reliable partners across Africa, Middle East, and Asia.')">
    <meta name="keywords" content="@yield('meta_keywords', 'ship chandlery, marine services, bunker delivery, fresh water supply, lubricating oils, port services')">
    <meta name="author" content="{{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}">
    <meta name="robots" content="index, follow">
    
    <meta property="og:title" content="@yield('meta_title', $settings['general']['site_name'] ?? 'Western Partners Marine Services')">
    <meta property="og:description" content="@yield('meta_description', 'Professional ship chandlery and marine servicing company')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('images/og-image.jpg'))">
    
    <link rel="icon" type="image/png" href="{{ $settings['general']['site_favicon'] ? asset('storage/' . $settings['general']['site_favicon']) : asset('images/favicon.png') }}">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Open+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <style>
        :root {
            --primary-color: #003366;
            --secondary-color: #0066cc;
            --accent-color: #00aaff;
            --text-dark: #1a1a2e;
            --text-light: #666666;
            --bg-light: #f8f9fa;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--text-dark);
            line-height: 1.7;
        }
        
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Montserrat', sans-serif;
            font-weight: 600;
        }
        
        /* Navigation Color and Alignment Updates */
        .navbar {
            padding: 1.25rem 0;
            transition: all 0.4s ease-in-out;
            background: transparent;
        }
        
        /* Text colors when navbar is over the transparent blue background hero */
        .navbar .navbar-brand {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #ffffff !important;
            transition: color 0.3s ease;
        }
        
        .navbar .navbar-nav .nav-link {
            font-weight: 500;
            padding: 0.75rem 1.25rem;
            color: rgba(255, 255, 255, 0.85) !important;
            transition: all 0.3s ease;
        }
        
        .navbar .navbar-nav .nav-link:hover,
        .navbar .navbar-nav .nav-link.active {
            color: var(--accent-color) !important;
        }

        /* Standardized Mobile Navbar Toggler Icon Color fixing white-on-white bug */
        .navbar .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
            padding: 0.4rem 0.6rem;
        }
        .navbar .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(255, 255, 255, 0.25);
        }
        .navbar .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 0.95%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Styles for inner non-home pages or when home layout is scrolled */
        .navbar.inner-page,
        .navbar.scrolled {
            background: #ffffff !important;
            box-shadow: 0 4px 25px rgba(0,0,0,0.08);
            padding: 0.85rem 0;
        }
        
        .navbar.inner-page .navbar-brand,
        .navbar.scrolled .navbar-brand {
            color: var(--primary-color) !important;
        }
        
        .navbar.inner-page .navbar-nav .nav-link,
        .navbar.scrolled .navbar-nav .nav-link {
            color: var(--text-dark) !important;
        }
        
        .navbar.inner-page .navbar-nav .nav-link:hover,
        .navbar.inner-page .navbar-nav .nav-link.active,
        .navbar.scrolled .navbar-nav .nav-link:hover,
        .navbar.scrolled .navbar-nav .nav-link.active {
            color: var(--secondary-color) !important;
        }

        .navbar.inner-page .navbar-toggler,
        .navbar.scrolled .navbar-toggler {
            border-color: rgba(0, 51, 102, 0.25);
        }
        .navbar.inner-page .navbar-toggler-icon,
        .navbar.scrolled .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%23003366' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
        
        /* Admin CTA Button overrides inside navbar context */
        .navbar-nav .nav-link.btn-login-nav {
            background: var(--secondary-color) !important;
            color: white !important;
            border-radius: 50px;
            padding: 0.5rem 1.5rem !important;
            margin-left: 0.5rem;
            text-align: center;
        }
        
        .navbar-nav .nav-link.btn-login-nav:hover {
            background: var(--accent-color) !important;
            color: white !important;
        }
        
        /* Mobile Breakpoint Specific Fixes (Standard Viewport <= 991px) */
        @media (max-width: 991.98px) {
            .navbar .navbar-collapse {
                background: #ffffff;
                box-shadow: 0 10px 30px rgba(0,0,0,0.15);
                border-radius: 12px;
                padding: 1.5rem;
                margin-top: 1rem;
            }
            /* Force link text inside the mobile dropdown container to be dark on dark/transparent pages */
            .navbar:not(.scrolled):not(.inner-page) .navbar-nav .nav-link {
                color: var(--text-dark) !important;
            }
            .navbar:not(.scrolled):not(.inner-page) .navbar-nav .nav-link:hover,
            .navbar:not(.scrolled):not(.inner-page) .navbar-nav .nav-link.active {
                color: var(--secondary-color) !important;
            }
            .navbar-nav .nav-link {
                padding: 0.6rem 1rem !important;
            }
            .navbar-nav .nav-link.btn-login-nav {
                margin-left: 0;
                margin-top: 0.75rem;
                display: inline-block;
                width: auto;
                align-self: flex-start;
            }
        }

        /* Hero Section Structural Padding Adjustments */
        .hero {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
            padding-top: 100px; /* Safe padding barrier underneath fixed menu */
        }
        
        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="%23ffffff" fill-opacity="0.05" d="M0,96L48,112C96,128,192,160,288,186.7C384,213,480,235,576,213.3C672,192,768,128,864,128C960,128,1056,192,1152,208C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            opacity: 0.1;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
            color: white;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }
        
        .hero p {
            font-size: 1.25rem;
            opacity: 0.9;
            max-width: 600px;
        }
        
        /* Buttons */
        .btn-primary-custom {
            background: var(--secondary-color);
            border: none;
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-primary-custom:hover {
            background: var(--accent-color);
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(0, 102, 204, 0.3);
        }
        
        .btn-outline-custom {
            border: 2px solid white;
            color: white;
            padding: 0.875rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-outline-custom:hover {
            background: white;
            color: var(--primary-color);
        }
        
        /* Sections */
        .section {
            padding: 100px 0;
        }
        
        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .section-subtitle {
            font-size: 1.125rem;
            color: var(--text-light);
            max-width: 600px;
            margin: 0 auto 3rem;
        }
        
        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #eee;
            height: 100%;
            overflow: hidden;
        }
        
        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0,0,0,0.1);
            border-color: var(--accent-color);
        }
        
        .service-card-image {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: var(--bg-light);
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .service-card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .service-card:hover .service-card-image img {
            transform: scale(1.08);
        }
        
        .service-card h4 {
            padding: 1.5rem 1.5rem 0.5rem;
        }
        
        .service-card p.text-muted {
            padding: 0 1.5rem 1.5rem;
        }
        
        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            margin: 2rem auto 1.5rem;
        }
        
        /* Network Section */
        .network-section {
            background: var(--bg-light);
        }
        
        .country-badge {
            display: inline-block;
            background: white;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            margin: 0.5rem;
            font-weight: 500;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }
        
        .country-badge:hover {
            background: var(--secondary-color);
            color: white;
            transform: scale(1.05);
        }
        
        /* Footer */
        .footer {
            background: var(--primary-color);
            color: white;
            padding: 60px 0 30px;
        }
        
        .footer h5 {
            font-size: 1.125rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }
        
        .footer h5::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 30px;
            height: 2px;
            background: var(--accent-color);
        }
        
        .footer a {
            color: rgba(255,255,255,0.7);
            transition: color 0.3s ease;
        }
        
        .footer a:hover {
            color: var(--accent-color);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 40px;
        }
        
        /* Contact Form */
        .contact-form .form-control {
            padding: 1rem;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        
        .contact-form .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 3px rgba(0, 102, 204, 0.1);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .section {
                padding: 60px 0;
            }
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top {{ request()->routeIs('frontend.home') ? '' : 'inner-page' }}" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="{{ route('frontend.home') }}">
                @if(($settings['general']['site_dark_logo'] ?? false) || ($settings['general']['site_light_logo'] ?? false))
                @if($settings['general']['site_dark_logo'] ?? false)
                <img src="{{ asset('storage/' . $settings['general']['site_dark_logo']) }}" alt="{{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}" height="40" class="logo-on-dark" style="{{ request()->routeIs('frontend.home') ? '' : 'display:none;' }}">
                @endif
                @if($settings['general']['site_light_logo'] ?? false)
                <img src="{{ asset('storage/' . $settings['general']['site_light_logo']) }}" alt="{{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}" height="40" class="logo-on-light" style="{{ request()->routeIs('frontend.home') ? 'display:none;' : '' }}">
                @endif
                @else
                <i class="fas fa-ship me-2"></i>{{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}
                @endif
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.offer') ? 'active' : '' }}" href="{{ route('frontend.offer') }}">Our Range</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.clients') ? 'active' : '' }}" href="{{ route('frontend.clients') }}">Our Customers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h5>{{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}</h5>
                    <p class="text-white-50">
                        {{ $settings['general']['site_description'] ?? 'Ship chandlery and marine servicing company, operating through a large range of network with reliable partners across Africa, Middle East, and Asia.' }}
                    </p>
                </div>
                <div class="col-lg-2 mb-4">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                        <li><a href="{{ route('frontend.offer') }}">Our Range</a></li>
                        <li><a href="{{ route('frontend.contact') }}">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Contact Us</h5>
                    <ul class="list-unstyled text-white-50">
                        @if($settings['contact']['contact_email'] ?? false)
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            {{ $settings['contact']['contact_email'] }}
                        </li>
                        @endif
                        @if($settings['contact']['contact_phone'] ?? false)
                        <li class="mb-2">
                            <i class="fas fa-phone me-2"></i>
                            {{ $settings['contact']['contact_phone'] }}
                        </li>
                        @endif
                        @if($settings['contact']['contact_address'] ?? false)
                        <li class="mb-2">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            {{ $settings['contact']['contact_address'] }}
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h5>Follow Us</h5>
                    <div class="social-links">
                        @if($settings['social']['social_facebook'] ?? false)
                        <a href="{{ $settings['social']['social_facebook'] }}" class="me-3" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($settings['social']['social_twitter'] ?? false)
                        <a href="{{ $settings['social']['social_twitter'] }}" class="me-3" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($settings['social']['social_linkedin'] ?? false)
                        <a href="{{ $settings['social']['social_linkedin'] }}" class="me-3" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($settings['social']['social_instagram'] ?? false)
                        <a href="{{ $settings['social']['social_instagram'] }}" class="me-3" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="footer-bottom text-center">
                <p class="text-white-50 mb-0">
                    &copy; {{ date('Y') }} {{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}. All Rights Reserved.
                </p>
            </div>
        </div>
    </footer>

    @if($settings['gdpr']['gdpr_cookie_banner'] ?? false)
    <div class="cookie-banner" id="cookieBanner" style="display: none; position: fixed; bottom: 0; left: 0; right: 0; background: var(--primary-color); color: white; padding: 1.5rem; z-index: 9999;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <p class="mb-0">
                        We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.
                        <a href="#" style="color: var(--accent-color);">Learn more</a>
                    </p>
                </div>
                <div class="col-md-4 text-md-right mt-3 mt-md-0">
                    <button class="btn btn-light me-2" onclick="acceptCookies()">Accept</button>
                    <button class="btn btn-outline-light" onclick="declineCookies()">Decline</button>
                </div>
            </div>
        </div>
    </div>
    @endif

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    @if($settings['integrations']['recaptcha_enabled'] ?? false)
    <script src="https://www.google.com/recaptcha/api.js?render={{ $settings['integrations']['recaptcha_site_key'] }}"></script>
    @endif
    
    @if($settings['integrations']['analytics_enabled'] ?? false)
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['integrations']['google_analytics_id'] }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $settings['integrations']['google_analytics_id'] }}');
    </script>
    @endif
    
    @if($settings['integrations']['live_chat_enabled'] ?? false)
    {!! $settings['integrations']['live_chat_script'] ?? '' !!}
    @endif
    
    <script>
        AOS.init({
            duration: 800,
            once: true
        });
        
        // Navbar scroll effect
        $(window).scroll(function() {
            if ($(this).scrollTop() > 50) {
                $('.navbar').addClass('scrolled');
                $('.logo-on-light').show();
                $('.logo-on-dark').hide();
            } else {
                $('.navbar').removeClass('scrolled');
                $('.logo-on-light').hide();
                $('.logo-on-dark').show();
            }
        });
        // Inner pages always show the light-background logo
        if ($('.navbar').hasClass('inner-page')) {
            $('.logo-on-light').show();
            $('.logo-on-dark').hide();
        }
        // Trigger scroll check on load
        $(window).trigger('scroll');
        
        // Cookie banner
        function acceptCookies() {
            document.cookie = "cookies_accepted=1; path=/; max-age=" + (60*60*24*365);
            $('#cookieBanner').hide();
        }
        
        function declineCookies() {
            document.cookie = "cookies_accepted=0; path=/; max-age=" + (60*60*24*365);
            $('#cookieBanner').hide();
        }
        
        if (document.cookie.indexOf('cookies_accepted') === -1) {
            setTimeout(function() {
                $('#cookieBanner').show();
            }, 2000);
        }
    </script>
    
    @stack('scripts')
</body>
</html>