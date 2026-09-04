@extends('frontend.layouts.main')

@section('meta_title', $page->meta_title ?? $page->title . ' - ' . ($settings['general']['site_name'] ?? 'Western Partners Marine Services'))
@section('meta_description', $page->meta_description ?? str(strip_tags($page->content))->limit(160))
@section('meta_keywords', $page->meta_keywords ?? '')

@section('content')
<section class="hero" style="min-height: 40vh;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center hero-content" data-aos="fade-up">
                <h1>{{ $page->title }}</h1>
                @if($page->excerpt)
                <p class="lead">{{ $page->excerpt }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 mx-auto" data-aos="fade-up">
                <div class="page-content">
                    {!! $page->content !!}
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .page-content h2 { color: var(--primary-color); margin-top: 2rem; margin-bottom: 1rem; }
    .page-content h3 { color: var(--secondary-color); margin-top: 1.5rem; }
    .page-content p { margin-bottom: 1rem; line-height: 1.8; }
    .page-content img { max-width: 100%; height: auto; border-radius: 8px; margin: 1rem 0; }
    .page-content ul, .page-content ol { margin-bottom: 1rem; padding-left: 2rem; }
    .page-content blockquote { border-left: 4px solid var(--accent-color); padding-left: 1rem; margin: 1rem 0; color: #666; }
    .page-content a { color: var(--secondary-color); }
</style>
@endsection
