@extends('admin.dashboard')

@section('title', 'View User')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">{{ $user->name }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">User Details</h3></div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr><th style="width:150px">ID</th><td>{{ $user->id }}</td></tr>
                            <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                            <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                            <tr><th>Status</th><td>@if($user->status == 'active')<span class="badge badge-success">Active</span>@else<span class="badge badge-secondary">Inactive</span>@endif</td></tr>
                            <tr><th>Roles</th><td>@foreach($user->roles as $role)<span class="badge badge-info">{{ $role->name }}</span> @endforeach</td></tr>
                            <tr><th>Last Login</th><td>{{ $user->last_login ? $user->last_login->format('d M Y H:i') : 'Never' }}</td></tr>
                            <tr><th>Created</th><td>{{ $user->created_at->format('d M Y H:i') }}</td></tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-info"><i class="fas fa-edit"></i> Edit</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Recent Activity</h3></div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr><th>Action</th><th>Description</th><th>Date</th></tr>
                            </thead>
                            <tbody>
                                @forelse($user->activityLogs()->latest()->take(10)->get() as $log)
                                <tr>
                                    <td><span class="badge badge-secondary">{{ $log->action }}</span></td>
                                    <td>{{ str($log->description)->limit(40) }}</td>
                                    <td>{{ $log->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr><td colspan="3" class="text-center">No activity yet.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
