@extends('admin.dashboard')

@section('title', 'Edit Email Template')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Edit Template: {{ $emailTemplate->name }}</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.email-templates.index') }}">Templates</a></li>
                    <li class="breadcrumb-item active">Edit</li>
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
                    <form action="{{ route('admin.email-templates.update', $emailTemplate) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Template Name *</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $emailTemplate->name) }}" required>
                                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <input type="text" name="type" class="form-control" value="{{ old('type', $emailTemplate->type) }}">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label">Status *</label>
                                        <select name="status" class="form-select" required>
                                            <option value="active" {{ old('status', $emailTemplate->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $emailTemplate->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subject *</label>
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" value="{{ old('subject', $emailTemplate->subject) }}" required>
                                @error('subject') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Body *</label>
                                <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="12">{{ old('body', $emailTemplate->body) }}</textarea>
                                @error('body') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update Template</button>
                            <a href="{{ route('admin.email-templates.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Current Variables</h3></div>
                    <div class="card-body">
                        @if(is_array($emailTemplate->variables) && count($emailTemplate->variables))
                            @foreach($emailTemplate->variables as $var)
                                <code>{{ '{{'.$var.'}}' }}</code><br>
                            @endforeach
                        @else
                            <p class="text-muted">No variables defined. Variables are auto-extracted from subject and body.</p>
                        @endif
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Actions</h3></div>
                    <div class="card-body">
                        <a href="{{ route('admin.email-templates.preview', $emailTemplate) }}" class="btn btn-success btn-block mb-2"><i class="fas fa-eye"></i> Preview</a>
                        <form action="{{ route('admin.email-templates.duplicate', $emailTemplate) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-info btn-block mb-2"><i class="fas fa-copy"></i> Duplicate</button>
                        </form>
                        <form action="{{ route('admin.email-templates.send-test', $emailTemplate) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="test_email" class="form-control" placeholder="test@email.com" required>
                                <button type="submit" class="btn btn-warning"><i class="fas fa-paper-plane"></i> Send Test</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
