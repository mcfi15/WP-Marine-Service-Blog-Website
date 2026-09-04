@extends('frontend.layouts.main')

@section('meta_title', $service->title . ' - ' . ($settings['general']['site_name'] ?? 'Western Partners Marine Services'))
@section('meta_description', $service->short_description ?? 'Learn more about our ' . $service->title . ' service.')

@section('content')
<section class="hero" style="min-height: 50vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center hero-content" data-aos="fade-up">
                <span class="badge bg-light text-primary mb-3 px-3 py-2">Our Services</span>
                <h1>{{ $service->title }}</h1>
                @if($service->short_description)
                <p class="lead">{{ $service->short_description }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row align-items-center">
            @if($service->image)
            <div class="col-lg-6" data-aos="fade-right">
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="mb-4">{!! $service->description !!}</div>
                <a href="{{ route('frontend.contact') }}" class="btn btn-primary-custom">
                    <i class="fas fa-envelope mr-2"></i>Request This Service
                </a>
            </div>
            @else
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up">
                @if($service->icon)
                <i class="fas {{ $service->icon }} fa-4x text-primary mb-4"></i>
                @endif
                <div class="mb-4 text-start">{!! $service->description !!}</div>
                <a href="{{ route('frontend.contact') }}" class="btn btn-primary-custom">
                    <i class="fas fa-envelope mr-2"></i>Request This Service
                </a>
            </div>
            @endif
        </div>
    </div>
</section>

<section class="section network-section">
    <div class="container text-center" data-aos="fade-up">
        <h2 class="mb-4">Need a Different Service?</h2>
        <p class="mb-4">Browse all our marine services and find exactly what you need.</p>
        <a href="{{ route('frontend.offer') }}" class="btn btn-primary-custom">
            <i class="fas fa-arrow-left mr-2"></i>Back to All Services
        </a>
    </div>
</section>
@endsection
