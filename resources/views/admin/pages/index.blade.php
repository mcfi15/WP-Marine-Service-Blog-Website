@extends('admin.dashboard')

@section('title', 'Pages')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Pages</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Pages</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Pages</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.pages.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Page</a>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" class="row mb-3">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Search pages..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="status" class="form-select">
                            <option value="all">All Status</option>
                            <option value="published" {{ request('status') == 'published' ? 'selected' : '' }}>Published</option>
                            <option value="draft" {{ request('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-secondary w-100">Filter</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Title</th>
                                <th>Slug</th>
                                <th>Status</th>
                                <th>Created By</th>
                                <th>Created</th>
                                <th width="150">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td><a href="{{ route('admin.pages.edit', $page) }}">{{ $page->title }}</a></td>
                                <td><code>{{ $page->slug }}</code></td>
                                <td>
                                    @switch($page->status)
                                        @case('published') <span class="badge badge-success">Published</span> @break
                                        @case('draft') <span class="badge badge-warning">Draft</span> @break
                                        @default <span class="badge badge-secondary">Archived</span>
                                    @endswitch
                                </td>
                                <td>{{ $page->creator->name ?? 'N/A' }}</td>
                                <td>{{ $page->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('frontend.page', $page->slug) }}" class="btn btn-success btn-sm" target="_blank"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this page?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center">No pages found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $pages->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
