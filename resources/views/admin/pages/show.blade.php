@extends('admin.dashboard')

@section('title', 'View Page')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">{{ $page->title }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Pages</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Page Details</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th style="width:200px">ID</th><td>{{ $page->id }}</td></tr>
                    <tr><th>Title</th><td>{{ $page->title }}</td></tr>
                    <tr><th>Slug</th><td><code>{{ $page->slug }}</code></td></tr>
                    <tr><th>Status</th><td>@switch($page->status) @case('published')<span class="badge badge-success">Published</span>@break @case('draft')<span class="badge badge-warning">Draft</span>@break @default<span class="badge badge-secondary">Archived</span>@endswitch</td></tr>
                    <tr><th>Parent</th><td>{{ $page->parent->title ?? 'None' }}</td></tr>
                    <tr><th>Order</th><td>{{ $page->order ?? 0 }}</td></tr>
                    <tr><th>Excerpt</th><td>{{ $page->excerpt ?? 'N/A' }}</td></tr>
                    <tr><th>Created By</th><td>{{ $page->creator->name ?? 'N/A' }}</td></tr>
                    <tr><th>Updated By</th><td>{{ $page->editor->name ?? 'N/A' }}</td></tr>
                    <tr><th>Created At</th><td>{{ $page->created_at->format('d M Y H:i') }}</td></tr>
                    <tr><th>Updated At</th><td>{{ $page->updated_at->format('d M Y H:i') }}</td></tr>
                </table>
                @if($page->content)
                <hr>
                <h5>Content</h5>
                <div class="p-3 bg-light rounded">{!! $page->content !!}</div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
