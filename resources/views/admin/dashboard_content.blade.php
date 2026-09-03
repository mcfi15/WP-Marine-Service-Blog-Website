@extends('admin.dashboard')

@section('title', 'Dashboard')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <!-- Stats Cards -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="card stat-card bg-primary">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Total Users</h6>
                                <h3 class="mb-0">{{ $stats['total_users'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users fa-2x text-white opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <div class="card stat-card bg-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Published Pages</h6>
                                <h3 class="mb-0">{{ $stats['published_pages'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-file-alt fa-2x text-white opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <div class="card stat-card bg-warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">New Contacts</h6>
                                <h3 class="mb-0">{{ $stats['new_contacts'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-envelope fa-2x text-white opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-6">
                <div class="card stat-card bg-info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="text-uppercase mb-1">Total Contacts</h6>
                                <h3 class="mb-0">{{ $stats['total_contacts'] }}</h3>
                            </div>
                            <div class="icon">
                                <i class="fas fa-address-book fa-2x text-white opacity-50"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contacts Overview</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="contactsChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Users Overview</h3>
                    </div>
                    <div class="card-body">
                        <canvas id="usersChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity Row -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Contacts</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-tool btn-sm">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentContacts as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        @switch($contact->status)
                                            @case('new')
                                                <span class="badge badge-primary">New</span>
                                                @break
                                            @case('read')
                                                <span class="badge badge-info">Read</span>
                                                @break
                                            @case('replied')
                                                <span class="badge badge-success">Replied</span>
                                                @break
                                            @default
                                                <span class="badge badge-secondary">Archived</span>
                                        @endswitch
                                    </td>
                                    <td>{{ $contact->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No contacts found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Recent Activity</h3>
                        <div class="card-tools">
                            <a href="{{ route('admin.activity-logs.index') }}" class="btn btn-tool btn-sm">
                                View All
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>User</th>
                                    <th>Action</th>
                                    <th>Description</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentActivity as $log)
                                <tr>
                                    <td>{{ $log->user->name ?? 'System' }}</td>
                                    <td>
                                        <span class="badge badge-secondary">{{ ucfirst($log->action) }}</span>
                                    </td>
                                    <td>{{ str($log->description)->limit(40) }}</td>
                                    <td>{{ $log->created_at->diffForHumans() }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center">No activity found.</td>
                                </tr>
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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    // Contacts Chart
    const contactsCtx = document.getElementById('contactsChart').getContext('2d');
    new Chart(contactsCtx, {
        type: 'line',
        data: {
            labels: {!! json_encode($contactsChart['labels']) !!},
            datasets: [{
                label: 'Contacts',
                data: {!! json_encode($contactsChart['data']) !!},
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });

    // Users Chart
    const usersCtx = document.getElementById('usersChart').getContext('2d');
    new Chart(usersCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($usersChart['labels']) !!},
            datasets: [{
                label: 'Users',
                data: {!! json_encode($usersChart['data']) !!},
                backgroundColor: '#198754',
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>
@endpush
