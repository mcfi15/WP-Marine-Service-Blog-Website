@extends('admin.dashboard')

@section('title', 'Preview: ' . $template->name)
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Preview: {{ $template->name }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.email-templates.index') }}">Templates</a></li>
                    <li class="breadcrumb-item active">Preview</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Subject: {{ $preview['subject'] }}</h3>
                <div class="card-tools">
                    <a href="{{ route('admin.email-templates.edit', $template) }}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                </div>
            </div>
            <div class="card-body">
                <div class="border rounded p-4" style="background:#f9f9f9;min-height:300px">
                    {!! $preview['body'] !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
