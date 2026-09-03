@php
    $slug = $page->slug ?? (old('slug') ?? '');
    $sections = $page->sections;
    if (is_string($sections)) {
        $decoded = json_decode($sections, true);
        $sections = is_array($decoded) ? $decoded : [];
    } elseif (!is_array($sections)) {
        $sections = [];
    }
    if (empty($sections) && old('sections')) {
        $sections = old('sections');
    }
@endphp

@if(in_array($slug, ['home', 'about-us', 'our-range', 'our-customers']))
    <p class="text-muted mb-3">Edit the structured content sections for this page. Changes appear immediately on the frontend.</p>
    
    @if($slug === 'home')
        @include('admin.pages.partials.sections-home')
    @elseif($slug === 'about-us')
        @include('admin.pages.partials.sections-about')
    @elseif($slug === 'our-range')
        @include('admin.pages.partials.sections-offer')
    @elseif($slug === 'our-customers')
        @include('admin.pages.partials.sections-clients')
    @endif

    <hr>
    <details class="mb-0">
        <summary class="text-muted small">Advanced: Raw JSON</summary>
        <div class="mt-2">
            <textarea class="form-control font-monospace" rows="8" style="font-size:12px" readonly>{{ is_string($sections) ? $sections : json_encode($sections, JSON_PRETTY_PRINT) }}</textarea>
            <small class="text-muted">Read-only preview. Edit using the structured fields above.</small>
        </div>
    </details>
@else
    <div class="mb-3">
        <label class="form-label">Page Sections (JSON)</label>
        <textarea name="sections" class="form-control font-monospace" rows="15" style="font-size:13px">{{ old('sections', is_string($sections) ? $sections : json_encode($sections, JSON_PRETTY_PRINT)) }}</textarea>
        <small class="text-muted">Enter JSON data for page components.</small>
    </div>
@endif
