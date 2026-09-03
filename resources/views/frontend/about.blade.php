@extends('frontend.layouts.main')

@section('meta_title', $page->meta_title ?? ($settings['seo']['seo_about_title'] ?? 'About Us - WP Marine Limited'))
@section('meta_description', $page->meta_description ?? ($settings['seo']['seo_about_description'] ?? 'Learn about WP Marine Limited'))

@section('content')
<section class="hero" style="min-height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center hero-content" data-aos="fade-up">
                <span class="badge bg-light text-primary mb-3 px-3 py-2">Since 2015</span>
                <h1>{{ $page->hero_heading ?? $page->title }}</h1>
                <p class="lead">{{ $page->hero_subheading ?? $page->excerpt ?? 'Your trusted partner in ship chandlery and marine servicing' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                @if($page->hero_image)
                <img src="{{ asset('storage/' . $page->hero_image) }}" alt="{{ $page->title }}" class="img-fluid rounded shadow">
                @else
                <img src="{{ asset('images/about-main.svg') }}" alt="About" class="img-fluid rounded shadow" onerror="this.style.display='none'">
                @endif
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="mb-4">{!! $page->content !!}</div>
            </div>
        </div>
    </div>
</section>

<section class="section network-section">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-6" data-aos="fade-up">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="service-icon mb-4"><i class="fas fa-bullseye"></i></div>
                        <h3>Our Mission</h3>
                        <p class="text-muted">{{ $page->sections['mission'] ?? 'To provide exceptional ship chandlery and marine services that exceed our clients\' expectations.' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-5">
                        <div class="service-icon mb-4"><i class="fas fa-eye"></i></div>
                        <h3>Our Vision</h3>
                        <p class="text-muted">{{ $page->sections['vision'] ?? 'To be the most trusted and preferred marine services partner across Africa, Middle East, and Asia.' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Our Core Values</h2>
            <p class="section-subtitle">The principles that guide everything we do</p>
        </div>
        <div class="row g-4">
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card h-100">
                    <div class="service-icon"><i class="fas fa-handshake"></i></div>
                    <h4>Reliability</h4>
                    <p class="text-muted">We deliver on our promises and maintain consistent quality in all our services.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card h-100">
                    <div class="service-icon"><i class="fas fa-award"></i></div>
                    <h4>Quality</h4>
                    <p class="text-muted">We maintain the highest standards in all products and services we provide.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card h-100">
                    <div class="service-icon"><i class="fas fa-users"></i></div>
                    <h4>Partnership</h4>
                    <p class="text-muted">We build lasting relationships with our clients based on trust and mutual success.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card h-100">
                    <div class="service-icon"><i class="fas fa-leaf"></i></div>
                    <h4>Sustainability</h4>
                    <p class="text-muted">We are committed to environmentally responsible practices in our operations.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: var(--bg-light);">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up">
                <div class="stat-number">
                    <h2 class="display-4 fw-bold text-primary">{{ $page->sections['stat_years'] ?? '10+' }}</h2>
                    <p class="text-muted">Years of Experience</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="100">
                <div class="stat-number">
                    <h2 class="display-4 fw-bold text-primary">{{ $page->sections['stat_countries'] ?? '20+' }}</h2>
                    <p class="text-muted">Countries Covered</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="200">
                <div class="stat-number">
                    <h2 class="display-4 fw-bold text-primary">{{ $page->sections['stat_ports'] ?? '500+' }}</h2>
                    <p class="text-muted">Ports &amp; Anchorages</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 text-center" data-aos="fade-up" data-aos-delay="300">
                <div class="stat-number">
                    <h2 class="display-4 fw-bold text-primary">{{ $page->sections['stat_clients'] ?? '1000+' }}</h2>
                    <p class="text-muted">Happy Clients</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
