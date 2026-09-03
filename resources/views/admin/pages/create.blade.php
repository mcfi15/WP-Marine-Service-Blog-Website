@extends('admin.dashboard')

@section('title', 'Create Page')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Create Page</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Pages</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <form action="{{ route('admin.pages.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-content" type="button" role="tab">Content</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-hero" type="button" role="tab">Hero Section</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-seo" type="button" role="tab">SEO</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-sections" type="button" role="tab">Sections (JSON)</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="tab-content" role="tabpanel">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label class="form-label">Title *</label>
                                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
                                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" placeholder="Leave empty to auto-generate">
                                        @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Content</label>
                                        <textarea name="content" class="form-control @error('content') is-invalid @enderror" rows="12">{{ old('content') }}</textarea>
                                        @error('content') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Status *</label>
                                        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                                            <option value="archived" {{ old('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Parent Page</label>
                                        <select name="parent_id" class="form-select">
                                            <option value="">None (Top Level)</option>
                                            @foreach($parentPages as $parent)
                                            <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>{{ $parent->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Order</label>
                                        <input type="number" name="order" class="form-control" value="{{ old('order', 0) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Excerpt</label>
                                        <textarea name="excerpt" class="form-control" rows="3">{{ old('excerpt') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-hero" role="tabpanel">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Hero Heading</label>
                                        <input type="text" name="hero_heading" class="form-control" value="{{ old('hero_heading') }}">
                                        <small class="text-muted">Large heading text for the hero banner. Leave empty to use page title.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Hero Subheading</label>
                                        <input type="text" name="hero_subheading" class="form-control" value="{{ old('hero_subheading') }}">
                                        <small class="text-muted">Subtitle text below the heading. Leave empty to use excerpt.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Hero Image</label>
                                        <input type="file" name="hero_image" class="form-control @error('hero_image') is-invalid @enderror" accept="image/png,image/jpeg,image/webp,image/svg+xml">
                                        @error('hero_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        <small class="text-muted">Upload hero banner image. Recommended: 1200x800px.</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Featured Image</label>
                                        <input type="file" name="featured_image" class="form-control @error('featured_image') is-invalid @enderror" accept="image/png,image/jpeg,image/webp,image/svg+xml">
                                        @error('featured_image') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                        <small class="text-muted">Upload featured/side image. Recommended: 800x600px.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-seo" role="tabpanel">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" maxlength="70">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="2" maxlength="160">{{ old('meta_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label">Meta Keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control" value="{{ old('meta_keywords') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-sections" role="tabpanel">
                            <div class="mb-3">
                                <label class="form-label">Page Sections (JSON)</label>
                                <textarea name="sections" class="form-control" rows="15" placeholder='{"services": [...], "testimonials": [...], "reasons": [...], "values": [...], "products": [...], "references": [...], "mission": "Our mission text...", "vision": "Our vision text..."}'>{{ old('sections') }}</textarea>
                                <small class="text-muted">
                                    Advanced: Customize page components. Each page template reads specific keys from this JSON.
                                    <a href="#" onclick="alert('See documentation for available section keys per template.'); return false;">Learn more</a>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Page</button>
                    <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
