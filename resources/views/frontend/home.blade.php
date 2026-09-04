@extends('frontend.layouts.main')

@section('meta_title', $page->meta_title ?? ($settings['seo']['seo_home_title'] ?? ($settings['general']['site_name'] ?? 'Western Partners Marine Services') . ' - Ship Chandlery & Marine Services Since 2015'))
@section('meta_description', $page->meta_description ?? ($settings['seo']['seo_home_description'] ?? 'Professional ship chandlery and marine servicing company'))

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="hero-content">
                    <span class="badge bg-light text-primary mb-3 px-3 py-2">Since 2015</span>
                    <h1>{{ $page->hero_heading ?? ($settings['general']['site_name'] ?? 'Western Partners Marine Services') }}</h1>
                    <p class="mb-4">
                        {{ $page->hero_subheading ?? ($settings['general']['site_tagline'] ?? 'We are ship chandlery and marine servicing company, operating through a large range of network, with reliable partners across multiple continents.') }}
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="{{ route('frontend.contact') }}" class="btn btn-primary-custom">
                            <i class="fas fa-envelope mr-2"></i>Get in Touch
                        </a>
                        <a href="{{ route('frontend.offer') }}" class="btn btn-outline-custom">
                            <i class="fas fa-anchor mr-2"></i>Our Services
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="text-center mt-5 mt-lg-0">
                    @if($page->hero_image)
                    <img src="{{ asset('storage/' . $page->hero_image) }}" alt="{{ $page->hero_heading ?? 'Marine Services' }}" class="img-fluid">
                    @else
                    <img src="{{ asset('images/ship-hero.svg') }}" alt="Marine Services" class="img-fluid" onerror="this.style.display='none'">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section" id="services">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">
                Comprehensive marine services tailored to meet all your shipping needs
            </p>
        </div>

        <div class="row g-4">
            @foreach($services as $i => $service)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ ($i % 3) * 100 + 100 }}">
                <a href="{{ route('frontend.service-detail', $service->slug) }}" class="text-decoration-none">
                    <div class="service-card">
                        <div class="service-card-image">
                            @if($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}">
                            @elseif($service->icon)
                            <div class="service-icon"><i class="fas {{ $service->icon }}"></i></div>
                            @else
                            <div class="service-icon"><i class="fas fa-ship"></i></div>
                            @endif
                        </div>
                        <h4>{{ $service->title }}</h4>
                        @if($service->short_description)
                        <p class="text-muted">{{ Illuminate\Support\Str::limit($service->short_description, 100) }}</p>
                        @endif
                    </div>
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <a href="{{ route('frontend.offer') }}" class="btn btn-primary-custom">
                View All Services <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
</section>

<!-- Network Section -->
<section class="section network-section" id="network">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Global Network</h2>
            <p class="section-subtitle">
                We make supplies in all ports and anchorage of these countries
            </p>
        </div>
        
        <div class="row" data-aos="fade-up">
            <div class="col-12">
                <div class="text-center">
                    <h5 class="mb-4 text-primary">Africa</h5>
                    <div class="mb-4">
                        <span class="country-badge">Morocco</span>
                        <span class="country-badge">Angola</span>
                        <span class="country-badge">Congo</span>
                        <span class="country-badge">Cameroon</span>
                        <span class="country-badge">Gambia</span>
                        <span class="country-badge">Liberia</span>
                        <span class="country-badge">Cote d'Ivoire</span>
                        <span class="country-badge">Ghana</span>
                        <span class="country-badge">Togo</span>
                        <span class="country-badge">Nigeria</span>
                        <span class="country-badge">Benin Republic</span>
                    </div>
                    
                    <h5 class="mb-4 text-primary">Middle East & Asia</h5>
                    <div>
                        <span class="country-badge">UAE</span>
                        <span class="country-badge">Iraq</span>
                        <span class="country-badge">Iran</span>
                        <span class="country-badge">Oman</span>
                        <span class="country-badge">Kuwait</span>
                        <span class="country-badge">Qatar</span>
                        <span class="country-badge">Singapore</span>
                        <span class="country-badge">Malaysia</span>
                        <span class="country-badge">China</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Preview Section -->
<section class="section" id="about">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-left">{{ $page->sections['about_title'] ?? 'Who We Are' }}</h2>
                <div class="mb-4">
                    {!! $page->content !!}
                </div>
                <ul class="list-unstyled mb-4">
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-primary mr-2"></i>
                        Over a decade of industry experience
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-primary mr-2"></i>
                        Extensive network of reliable partners
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-primary mr-2"></i>
                        24/7 support and emergency services
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-check-circle text-primary mr-2"></i>
                        Competitive pricing and quality assurance
                    </li>
                </ul>
                <a href="{{ route('frontend.about') }}" class="btn btn-primary-custom">
                    Learn More About Us <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="text-center">
                    @if($page->featured_image)
                    <img src="{{ asset('storage/' . $page->featured_image) }}" alt="About Us" class="img-fluid">
                    @else
                    <img src="{{ asset('images/about-preview.svg') }}" alt="About Us" class="img-fluid" onerror="this.style.display='none'">
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center text-white">
        <h2 class="mb-4" data-aos="fade-up">Ready to Get Started?</h2>
        <p class="mb-4" data-aos="fade-up" data-aos-delay="100">
            Contact us today for a quote or to discuss your marine service requirements.
        </p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-custom" data-aos="fade-up" data-aos-delay="200">
            <i class="fas fa-paper-plane mr-2"></i>Contact Us Now
        </a>
    </div>
</section>
@endsection
