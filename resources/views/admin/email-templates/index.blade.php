@extends('admin.dashboard')

@section('title', 'Email Templates')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Email Templates</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Email Templates</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Templates</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.email-templates.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Create Template</a>
                    <form action="{{ route('admin.email-templates.create-defaults') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-file"></i> Create Defaults</button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" class="row mb-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="type" class="form-select">
                            <option value="all">All Types</option>
                            @foreach($types as $type)
                            <option value="{{ $type }}" {{ request('type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="all">All Status</option>
                            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" class="btn btn-secondary w-100">Filter</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Type</th>
                                <th>Status</th>
                                <th>Variables</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($templates as $template)
                            <tr>
                                <td>{{ $template->id }}</td>
                                <td><a href="{{ route('admin.email-templates.edit', $template) }}">{{ $template->name }}</a></td>
                                <td>{{ $template->subject }}</td>
                                <td><span class="badge badge-info">{{ $template->type ?? 'General' }}</span></td>
                                <td>
                                    @if($template->status == 'active')
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-secondary">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    @if(is_array($template->variables))
                                        @foreach($template->variables as $var)
                                            <code>{{ '{' . '{' . $var . '}' . '}' }}</code>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.email-templates.edit', $template) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a>
                                    <a href="{{ route('admin.email-templates.preview', $template) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admin.email-templates.destroy', $template) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this template?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center">No templates found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $templates->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
