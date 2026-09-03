@extends('frontend.layouts.main')

@section('meta_title', $page->meta_title ?? 'Our Customers - WP Marine Limited')
@section('meta_description', $page->meta_description ?? 'Trusted by ship owners, operators, and charterers worldwide.')

@section('content')
<section class="hero" style="min-height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center hero-content" data-aos="fade-up">
                <span class="badge bg-light text-primary mb-3 px-3 py-2">Testimonials</span>
                <h1>{{ $page->hero_heading ?? $page->title }}</h1>
                <p class="lead">{{ $page->hero_subheading ?? $page->excerpt ?? 'Trusted by ship owners, operators, and charterers worldwide' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="references">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">{{ $page->sections['references_title'] ?? 'Our References' }}</h2>
            <p class="section-subtitle">{{ $page->sections['references_subtitle'] ?? 'Serving clients across various sectors of the maritime industry' }}</p>
        </div>
        <div class="row g-4">
            @foreach(($page->sections['references'] ?? []) as $ref)
            <div class="col-lg-3 col-md-6" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100 text-center p-4">
                    <i class="fas {{ $ref['icon'] ?? 'fa-ship' }} fa-4x text-primary mb-3"></i>
                    <h5>{{ $ref['title'] ?? '' }}</h5>
                    <p class="text-muted small mb-0">{{ $ref['description'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section network-section" id="testimonials">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">{{ $page->sections['testimonials_title'] ?? 'What Our Clients Say' }}</h2>
            <p class="section-subtitle">{{ $page->sections['testimonials_subtitle'] ?? 'Hear from our satisfied clients' }}</p>
        </div>
        <div class="row g-4">
            @foreach(($page->sections['testimonials'] ?? []) as $t)
            <div class="col-lg-4" data-aos="fade-up">
                <div class="card border-0 shadow-sm h-100 p-4">
                    <div class="card-body">
                        <div class="mb-3">
                            @for($i = 0; $i < ($t['rating'] ?? 5); $i++)
                            <i class="fas fa-star text-warning"></i>
                            @endfor
                        </div>
                        <p class="card-text text-muted">"{{ $t['quote'] ?? '' }}"</p>
                        <div class="d-flex align-items-center mt-3">
                            <div class="ms-3">
                                <h6 class="mb-0">{{ $t['name'] ?? '' }}</h6>
                                <small class="text-muted">{{ $t['position'] ?? '' }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">{{ $page->sections['why_title'] ?? 'Why Choose Us' }}</h2>
            <p class="section-subtitle">{{ $page->sections['why_subtitle'] ?? 'Reasons to partner with WP Marine Limited' }}</p>
        </div>
        <div class="row g-4">
            @foreach(($page->sections['reasons'] ?? []) as $reason)
            <div class="col-md-6 col-lg-3" data-aos="fade-up">
                <div class="text-center">
                    <div class="service-icon mx-auto mb-3"><i class="fas {{ $reason['icon'] ?? 'fa-check' }}"></i></div>
                    <h5>{{ $reason['title'] ?? '' }}</h5>
                    <p class="text-muted">{{ $reason['description'] ?? '' }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
