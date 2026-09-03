@extends('admin.dashboard')

@section('title', 'System Info')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">System Information</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">System Info</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Server Information</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    @foreach($info as $key => $value)
                    <tr>
                        <th style="width:200px">{{ ucwords(str_replace('_', ' ', $key)) }}</th>
                        <td>{{ $value }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Cache</h3></div>
                    <div class="card-body">
                        <form action="{{ route('admin.system.clear-cache') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-warning btn-block"><i class="fas fa-eraser"></i> Clear Cache</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Logs</h3></div>
                    <div class="card-body">
                        <form action="{{ route('admin.system.clear-logs') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-trash"></i> Clear Logs</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Optimization</h3></div>
                    <div class="card-body">
                        <form action="{{ route('admin.system.optimize') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-success btn-block"><i class="fas fa-tachometer-alt"></i> Optimize</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header"><h3 class="card-title">Environment</h3></div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th style="width:200px">APP_ENV</th><td>{{ env('APP_ENV') }}</td></tr>
                    <tr><th>APP_DEBUG</th><td>{{ env('APP_DEBUG') ? 'true' : 'false' }}</td></tr>
                    <tr><th>APP_URL</th><td>{{ env('APP_URL') }}</td></tr>
                    <tr><th>DB_DATABASE</th><td>{{ env('DB_DATABASE') }}</td></tr>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection
