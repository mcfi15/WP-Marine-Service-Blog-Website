@extends('admin.dashboard')

@section('title', 'View Contact')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Contact from {{ $contact->name }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.contacts.index') }}">Contacts</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Message Details</h3>
                        <div class="card-tools">
                            <span class="badge badge-{{ $contact->status == 'new' ? 'warning' : ($contact->status == 'replied' ? 'success' : 'info') }} p-2">
                                {{ ucfirst($contact->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr><th style="width:150px">Name</th><td>{{ $contact->name }}</td></tr>
                            <tr><th>Email</th><td><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></td></tr>
                            <tr><th>Phone</th><td>{{ $contact->phone ?? 'N/A' }}</td></tr>
                            <tr><th>Subject</th><td>{{ $contact->subject ?? 'N/A' }}</td></tr>
                            <tr><th>Date</th><td>{{ $contact->created_at->format('d M Y H:i') }}</td></tr>
                            <tr><th>IP Address</th><td>{{ $contact->ip_address ?? 'N/A' }}</td></tr>
                            <tr><th>User Agent</th><td><small>{{ $contact->user_agent ?? 'N/A' }}</small></td></tr>
                        </table>
                        <hr>
                        <h5>Message</h5>
                        <div class="p-3 bg-light rounded">
                            {{ $contact->message }}
                        </div>
                    </div>
                    <div class="card-footer">
                        @if($contact->status != 'replied')
                        <form action="{{ route('admin.contacts.mark-replied', $contact) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Mark as Replied</button>
                        </form>
                        @endif
                        @if($contact->status == 'new')
                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-info"><i class="fas fa-eye"></i> Mark as Read</button>
                        </form>
                        @endif
                        <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this contact?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Quick Actions</h3></div>
                    <div class="card-body">
                        <a href="mailto:{{ $contact->email }}" class="btn btn-primary btn-block mb-2"><i class="fas fa-reply"></i> Reply via Email</a>
                        <form action="{{ route('admin.contacts.archive', $contact) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-block"><i class="fas fa-archive"></i> Archive</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
