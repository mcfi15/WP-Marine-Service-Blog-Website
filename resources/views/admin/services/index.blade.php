@extends('admin.dashboard')

@section('title', 'Services')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Services</h1></div>
            <div class="col-sm-6 text-sm-end">
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Service</a>
            </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th style="width:60px">Image</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Order</th>
                            <th style="width:120px">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                        <tr>
                            <td>
                                @if($service->image)
                                <img src="{{ asset('storage/' . $service->image) }}" alt="" style="width:50px;height:50px;object-fit:cover;border-radius:6px;">
                                @endif
                            </td>
                            <td>{{ $service->title }}</td>
                            <td>
                                @if($service->status === 'published')
                                <span class="badge bg-success">Published</span>
                                @else
                                <span class="badge bg-secondary">Draft</span>
                                @endif
                            </td>
                            <td>{{ $service->sort_order }}</td>
                            <td>
                                <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr><td colspan="5" class="text-center text-muted py-4">No services yet.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if($services->hasPages())
            <div class="card-footer">{{ $services->links() }}</div>
            @endif
        </div>
    </div>
</section>
@endsection
