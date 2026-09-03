@extends('admin.dashboard')

@section('title', 'Contacts')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Contacts</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contacts</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row mb-3">
            @foreach($statusCounts as $key => $count)
            <div class="col-md-2 col-6">
                <div class="small-box bg-{{ $key == 'new' ? 'warning' : ($key == 'replied' ? 'success' : ($key == 'archived' ? 'secondary' : 'info')) }}">
                    <div class="inner"><h3>{{ $count }}</h3><p>{{ ucfirst($key) }}</p></div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Contacts</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.contacts.export') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Export CSV</a>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" class="row mb-3">
                    <div class="col-md-3">
                        <input type="text" name="search" class="form-control" placeholder="Search name or email..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2">
                        <select name="status" class="form-select">
                            <option value="all">All Status</option>
                            <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>New</option>
                            <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Read</option>
                            <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Replied</option>
                            <option value="archived" {{ request('status') == 'archived' ? 'selected' : '' }}>Archived</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_from" class="form-control" value="{{ request('date_from') }}" placeholder="From">
                    </div>
                    <div class="col-md-2">
                        <input type="date" name="date_to" class="form-control" value="{{ request('date_to') }}" placeholder="To">
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
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($contacts as $contact)
                            <tr class="{{ $contact->status == 'new' ? 'table-warning' : '' }}">
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ str($contact->subject ?? 'No subject')->limit(30) }}</td>
                                <td>
                                    @switch($contact->status)
                                        @case('new') <span class="badge badge-warning">New</span> @break
                                        @case('read') <span class="badge badge-info">Read</span> @break
                                        @case('replied') <span class="badge badge-success">Replied</span> @break
                                        @default <span class="badge badge-secondary">Archived</span>
                                    @endswitch
                                </td>
                                <td>{{ $contact->created_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this contact?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center">No contacts found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $contacts->links() }}
            </div>
        </div>
    </div>
</section>
@endsection
