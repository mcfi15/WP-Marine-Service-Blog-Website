@extends('admin.dashboard')

@section('title', 'View Activity Log')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Activity Log #{{ $activityLog->id }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.activity-logs.index') }}">Activity Logs</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th style="width:200px">ID</th><td>{{ $activityLog->id }}</td></tr>
                    <tr><th>User</th><td>{{ $activityLog->user->name ?? 'System' }}</td></tr>
                    <tr><th>Action</th><td><span class="badge badge-secondary">{{ $activityLog->action }}</span></td></tr>
                    <tr><th>Description</th><td>{{ $activityLog->description }}</td></tr>
                    <tr><th>Model Type</th><td>{{ $activityLog->model_type ?? 'N/A' }}</td></tr>
                    <tr><th>Model ID</th><td>{{ $activityLog->model_id ?? 'N/A' }}</td></tr>
                    <tr><th>IP Address</th><td>{{ $activityLog->ip_address ?? 'N/A' }}</td></tr>
                    <tr><th>User Agent</th><td><small>{{ $activityLog->user_agent ?? 'N/A' }}</small></td></tr>
                    <tr><th>Date</th><td>{{ $activityLog->created_at->format('d M Y H:i:s') }}</td></tr>
                </table>
                @if($activityLog->old_values)
                <hr>
                <h5>Old Values</h5>
                <pre class="bg-light p-3 rounded">{{ json_encode($activityLog->old_values, JSON_PRETTY_PRINT) }}</pre>
                @endif
                @if($activityLog->new_values)
                <hr>
                <h5>New Values</h5>
                <pre class="bg-light p-3 rounded">{{ json_encode($activityLog->new_values, JSON_PRETTY_PRINT) }}</pre>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
