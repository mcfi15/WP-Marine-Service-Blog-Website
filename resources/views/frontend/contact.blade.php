@extends('frontend.layouts.main')

@section('meta_title', $page->meta_title ?? 'Contact Us - ' . ($settings['general']['site_name'] ?? 'Western Partners Marine Services'))
@section('meta_description', $page->meta_description ?? 'Get in touch for inquiries about our marine services, quotes, or partnership opportunities.')

@section('content')
<section class="hero" style="min-height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center hero-content" data-aos="fade-up">
                <span class="badge bg-light text-primary mb-3 px-3 py-2">Get in Touch</span>
                <h1>{{ $page->hero_heading ?? $page->title }}</h1>
                <p class="lead">{{ $page->hero_subheading ?? $page->excerpt ?? 'We\'d love to hear from you.' }}</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5" data-aos="fade-right">
                <h2 class="section-title text-left mb-4">Get In Touch</h2>
                <p class="text-muted mb-5">{!! $page->content !!}</p>
                <div class="contact-info">
                    <div class="d-flex mb-4">
                        <div class="me-3">
                            <div class="service-icon" style="width: 60px; height: 60px; font-size: 1.25rem;">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="mb-1">Email</h5>
                            <p class="text-muted mb-0">
                                <a href="mailto:{{ $settings['contact']['contact_email'] ?? 'info@wpmarinelimited.com' }}" class="text-decoration-none">{{ $settings['contact']['contact_email'] ?? 'info@wpmarinelimited.com' }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex mb-4">
                        <div class="me-3">
                            <div class="service-icon" style="width: 60px; height: 60px; font-size: 1.25rem;">
                                <i class="fas fa-phone"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="mb-1">Phone</h5>
                            <p class="text-muted mb-0">
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $settings['contact']['contact_phone'] ?? '+233262772397') }}" class="text-decoration-none">{{ $settings['contact']['contact_phone'] ?? '+233 262 772 397' }}</a>
                            </p>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="me-3">
                            <div class="service-icon" style="width: 60px; height: 60px; font-size: 1.25rem;">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                        </div>
                        <div>
                            <h5 class="mb-1">Address</h5>
                            <p class="text-muted mb-0">{{ $settings['contact']['contact_address'] ?? 'Contact us for our office address' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                <div class="card border-0 shadow-sm p-4">
                    <div class="card-body">
                        <h3 class="mb-4">Send Us a Message</h3>
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('frontend.contact.submit') }}" class="contact-form">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Your Name *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email Address *</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                                    @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="phone" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="subject" class="form-label">Subject</label>
                                    <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}">
                                    @error('subject')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Your Message *</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            @if($settings['integrations']['recaptcha_enabled'] ?? false)
                            <div class="mb-3">
                                <div class="g-recaptcha" data-sitekey="{{ $settings['integrations']['recaptcha_site_key'] }}"></div>
                                @error('g-recaptcha-response')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            @endif
                            <button type="submit" class="btn btn-primary-custom"><i class="fas fa-paper-plane mr-2"></i>Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section network-section">
    <div class="container">
        <div class="text-center" data-aos="fade-up">
            <h2 class="section-title">Our Coverage Areas</h2>
            <p class="section-subtitle">We serve ports and anchorages across these regions</p>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm p-4" data-aos="fade-up">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <h5 class="text-primary mb-3">Africa</h5>
                            <p class="text-muted mb-0">Morocco, Angola, Congo, Cameroon, Gambia, Liberia, Cote d'Ivoire, Ghana, Togo, Nigeria, Benin Republic</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-primary mb-3">Middle East</h5>
                            <p class="text-muted mb-0">UAE, Iraq, Iran, Oman, Kuwait, Qatar</p>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-primary mb-3">Asia</h5>
                            <p class="text-muted mb-0">Singapore, Malaysia, China</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@if($settings['integrations']['recaptcha_enabled'] ?? false)
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endif
@endpush
