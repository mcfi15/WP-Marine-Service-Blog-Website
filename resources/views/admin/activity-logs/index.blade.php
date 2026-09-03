@extends('admin.dashboard')

@section('title', 'Activity Logs')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Activity Logs</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Activity Logs</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Activity</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.activity-logs.export') }}" class="btn btn-success btn-sm"><i class="fas fa-download"></i> Export CSV</a>
                </div>
            </div>
            <div class="card-body">
                <form method="GET" class="row mb-3">
                    <div class="col-md-2">
                        <select name="action" class="form-select">
                            <option value="all">All Actions</option>
                            @foreach($actions as $action)
                            <option value="{{ $action }}" {{ request('action') == $action ? 'selected' : '' }}>{{ ucfirst($action) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="user" class="form-select">
                            <option value="all">All Users</option>
                            @foreach($users as $id => $name)
                            <option value="{{ $id }}" {{ request('user') == $id ? 'selected' : '' }}>{{ $name }}</option>
                            @endforeach
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
                                <th>User</th>
                                <th>Action</th>
                                <th>Description</th>
                                <th>Model</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($logs as $log)
                            <tr>
                                <td>{{ $log->id }}</td>
                                <td>{{ $log->user->name ?? 'System' }}</td>
                                <td><span class="badge badge-secondary">{{ $log->action }}</span></td>
                                <td>{{ str($log->description)->limit(60) }}</td>
                                <td><small>{{ class_basename($log->model_type) }} #{{ $log->model_id }}</small></td>
                                <td>{{ $log->created_at->format('d M Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.activity-logs.show', $log) }}" class="btn btn-info btn-sm"><i class="fas fa-eye"></i></a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="7" class="text-center">No activity logs found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $logs->links() }}

                <hr>
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Clear Old Logs</h3></div>
                    <div class="card-body">
                        <form action="{{ route('admin.activity-logs.clear-old') }}" method="POST" class="row">
                            @csrf
                            <div class="col-md-3">
                                <input type="number" name="days" class="form-control" placeholder="Days" value="30" min="1" max="365" required>
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Clear Older Than</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
