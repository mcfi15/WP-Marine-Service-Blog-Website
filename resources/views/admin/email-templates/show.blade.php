@extends('admin.dashboard')

@section('title', 'View Template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">{{ $emailTemplate->name }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.email-templates.index') }}">Templates</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Template Details</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.email-templates.edit', $emailTemplate) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <tr><th style="width:200px">Name</th><td>{{ $emailTemplate->name }}</td></tr>
                    <tr><th>Subject</th><td>{{ $emailTemplate->subject }}</td></tr>
                    <tr><th>Type</th><td>{{ $emailTemplate->type ?? 'General' }}</td></tr>
                    <tr><th>Status</th><td>@if($emailTemplate->status == 'active')<span class="badge badge-success">Active</span>@else<span class="badge badge-secondary">Inactive</span>@endif</td></tr>
                    <tr><th>Variables</th><td>@if(is_array($emailTemplate->variables))@foreach($emailTemplate->variables as $var)<code>{{ '{{'.$var.'}}' }}</code> @endforeach @endif</td></tr>
                </table>
                <hr>
                <h5>Body</h5>
                <div class="p-3 bg-light rounded" style="max-height:400px;overflow-y:auto">{!! nl2br(e($emailTemplate->body)) !!}</div>
            </div>
        </div>
    </div>
</section>
@endsection
