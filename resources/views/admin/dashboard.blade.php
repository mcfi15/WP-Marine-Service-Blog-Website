<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') - {{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ $settings['general']['site_favicon'] ? asset('storage/' . $settings['general']['site_favicon']) : asset('images/favicon.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Admin LTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/css/adminlte.min.css">
    
    <style>
        :root {
            --primary-color: #0d6efd;
            --sidebar-dark-bg: #1a1a2e;
            --sidebar-dark-hover: #16213e;
        }
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
            .main-sidebar {
                background-color: var(--sidebar-dark-bg) !important;
            }
            
            .nav-link.active {
                background-color: var(--primary-color) !important;
            }
            
            .nav-link:hover {
                background-color: var(--sidebar-dark-hover) !important;
            }
            
            /* Sidebar: show favicon when collapsed, hide when expanded */
            .sidebar-mini:not(.sidebar-collapse) .brand-link .brand-image {
                display: none !important;
            }
            .sidebar-mini.sidebar-collapse .brand-link .brand-image {
                display: inline-block !important;
            }
        
        .content-wrapper {
            background-color: #f4f6f9;
        }
        
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        
        .stat-card {
            transition: transform 0.2s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
    </style>
    
    @stack('styles')
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('frontend.home') }}" target="_blank">
                        <i class="fas fa-external-link-alt"></i> View Site
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-user-circle"></i>
                        <span class="d-none d-md-inline ml-1">{{ auth()->user()->name }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('admin.users.show', auth()->user()) }}" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i> Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt mr-2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        
        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('admin.dashboard') }}" class="brand-link">
                <img src="{{ $settings['general']['site_favicon'] ? asset('storage/' . $settings['general']['site_favicon']) : asset('images/favicon.png') }}" alt="Icon" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    @if($settings['general']['site_dark_logo'] ?? false)
                    <img src="{{ asset('storage/' . $settings['general']['site_dark_logo']) }}" alt="{{ $settings['general']['site_name'] ?? 'Logo' }}" style="max-height: 24px; margin-right: 6px;">
                    @else
                    {{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}
                    @endif
                </span>
            </a>
            
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>Pages (CMS)</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-anchor"></i>
                                <p>Services</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-envelope"></i>
                                <p>Contacts</p>
                                @php
                                    $newContacts = \App\Models\Contact::where('status', 'new')->count();
                                @endphp
                                @if($newContacts > 0)
                                    <span class="badge badge-danger right">{{ $newContacts }}</span>
                                @endif
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.email-templates.index') }}" class="nav-link {{ request()->routeIs('admin.email-templates.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-mail-bulk"></i>
                                <p>Email Templates</p>
                            </a>
                        </li>
                        
                        <li class="nav-header">MANAGEMENT</li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Users</p>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.activity-logs.index') }}" class="nav-link {{ request()->routeIs('admin.activity-logs.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-history"></i>
                                <p>Activity Logs</p>
                            </a>
                        </li>
                        
                        <li class="nav-header">SETTINGS</li>
                        
                        <li class="nav-item">
                            <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ session()->get('success') }}
                </div>
            @endif
            
            @if(session()->has('error'))
                <div class="alert alert-danger alert-dismissible m-3">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-ban"></i> Error!</h5>
                    {{ session()->get('error') }}
                </div>
            @endif
            
            @yield('content')
        </div>
        
        <!-- Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                <strong>Version</strong> 1.0.0
            </div>
            <strong>Copyright &copy; {{ date('Y') }} <a href="{{ route('frontend.home') }}">{{ $settings['general']['site_name'] ?? 'Western Partners Marine Services' }}</a>.</strong> All rights reserved.
        </footer>
    </div>
    
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Admin LTE JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2.0/dist/js/adminlte.min.js"></script>
    
    @stack('scripts')
    <script>
        $(document).on('click', '.remove-item', function() {
            $(this).closest('.value-item, .product-item, .reference-item, .testimonial-item, .reason-item').remove();
        });
    </script>
</body>
</html>
