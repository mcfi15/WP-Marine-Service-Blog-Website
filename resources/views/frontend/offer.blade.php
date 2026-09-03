@extends('frontend.layouts.main')

@section('meta_title', $page->meta_title ?? ($settings['seo']['seo_offer_title'] ?? 'Our Services - WP Marine Limited'))
@section('meta_description', $page->meta_description ?? ($settings['seo']['seo_offer_description'] ?? 'Discover our comprehensive marine services'))

@section('content')
<section class="hero" style="min-height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center hero-content" data-aos="fade-up">
                <span class="badge bg-light text-primary mb-3 px-3 py-2">Our Services</span>
                <h1>{{ $page->hero_heading ?? $page->title }}</h1>
                <p class="lead">{{ $page->hero_subheading ?? $page->excerpt ?? 'Comprehensive marine services to meet all your shipping needs' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="services">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">{{ $page->sections['services_title'] ?? 'What We Offer' }}</h2>
            <p class="section-subtitle">{{ $page->sections['services_subtitle'] ?? 'From provisions to technical supplies, we provide a complete range of marine services' }}</p>
        </div>

        <div class="row g-4">
            @forelse($services as $i => $service)
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
                        <p class="text-muted">{{ Illuminate\Support\Str::limit($service->short_description, 120) }}</p>
                        @endif
                    </div>
                </a>
            </div>
            @empty
            <div class="col-12 text-center text-muted py-5">
                {!! $page->content !!}
            </div>
            @endforelse
        </div>
    </div>
</section>

<section class="section network-section" id="value">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right">
                <h2 class="section-title text-left">{{ $page->sections['value_title'] ?? 'Our Added Value' }}</h2>
                <p class="mb-4">{{ $page->sections['value_subtitle'] ?? 'We provide comprehensive solutions that add value to your operations.' }}</p>
                <div class="mb-4">
                    @foreach(($page->sections['values'] ?? []) as $value)
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3"><i class="fas {{ $value['icon'] ?? 'fa-check-circle' }} text-primary fa-2x"></i></div>
                        <div>
                            <h5>{{ $value['title'] ?? '' }}</h5>
                            <p class="text-muted mb-0">{{ $value['description'] ?? '' }}</p>
                        </div>
                    </div>
                    @endforeach
                    @if(empty($page->sections['values']))
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3"><i class="fas fa-clock text-primary fa-2x"></i></div>
                        <div><h5>24/7 Availability</h5><p class="text-muted mb-0">Round-the-clock support for emergency requirements.</p></div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3"><i class="fas fa-dollar-sign text-primary fa-2x"></i></div>
                        <div><h5>Competitive Pricing</h5><p class="text-muted mb-0">Best-in-market prices without compromising quality.</p></div>
                    </div>
                    <div class="d-flex align-items-start mb-3">
                        <div class="me-3"><i class="fas fa-certificate text-primary fa-2x"></i></div>
                        <div><h5>Quality Assurance</h5><p class="text-muted mb-0">All products meet international quality standards.</p></div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="me-3"><i class="fas fa-headset text-primary fa-2x"></i></div>
                        <div><h5>Dedicated Support</h5><p class="text-muted mb-0">Personal account managers for quick response.</p></div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                @if($page->featured_image)
                <img src="{{ asset('storage/' . $page->featured_image) }}" alt="Our Value" class="img-fluid rounded shadow">
                @else
                <img src="{{ asset('images/value-added.svg') }}" alt="Our Value" class="img-fluid rounded shadow" onerror="this.style.display='none'">
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section" id="products">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">{{ $page->sections['products_title'] ?? 'Our Products' }}</h2>
            <p class="section-subtitle">{{ $page->sections['products_subtitle'] ?? 'Quality products from trusted brands' }}</p>
        </div>
        <div class="row g-4">
            @foreach(($page->sections['products'] ?? []) as $product)
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="service-card">
                    <i class="fas {{ $product['icon'] ?? 'fa-box' }} fa-3x text-primary mb-3"></i>
                    <h5>{{ $product['name'] ?? '' }}</h5>
                    <p class="text-muted small">{{ $product['brands'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);">
    <div class="container text-center text-white">
        <h2 class="mb-4" data-aos="fade-up">{{ $page->sections['cta_title'] ?? 'Need a Custom Quote?' }}</h2>
        <p class="mb-4" data-aos="fade-up" data-aos-delay="100">{{ $page->sections['cta_text'] ?? 'Contact us today with your requirements.' }}</p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-outline-custom" data-aos="fade-up" data-aos-delay="200"><i class="fas fa-envelope mr-2"></i>{{ $page->sections['cta_btn'] ?? 'Request Quote' }}</a>
    </div>
</section>
@endsection
