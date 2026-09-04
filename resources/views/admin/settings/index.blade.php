@extends('admin.dashboard')

@section('title', 'Settings')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6"><h1 class="m-0">Settings</h1></div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Settings</li>
                </ol>
            </div>
        </div>
        @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Groups</h3></div>
                    <div class="card-body p-0">
                        <div class="nav nav-pills flex-column" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#general" type="button" role="tab"><i class="fas fa-globe"></i> General</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#contact" type="button" role="tab"><i class="fas fa-address-card"></i> Contact</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#email" type="button" role="tab"><i class="fas fa-envelope"></i> Email</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#seo" type="button" role="tab"><i class="fas fa-search"></i> SEO</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#integrations" type="button" role="tab"><i class="fas fa-plug"></i> Integrations</button>
                            <button class="nav-link" data-bs-toggle="pill" data-bs-target="#social" type="button" role="tab"><i class="fas fa-share-alt"></i> Social</button>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Danger Zone</h3></div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.reset') }}" method="POST" onsubmit="return confirm('Reset ALL settings to defaults? This cannot be undone.')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-block"><i class="fas fa-undo"></i> Reset to Defaults</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="tab-content">
                    <!-- General -->
                    <div class="tab-pane fade show active" id="general" role="tabpanel">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">General Settings</h3></div>
                            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Site Name</label>
                                        <input type="text" name="site_name" class="form-control" value="{{ $settings['general']['site_name'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Site Tagline</label>
                                        <input type="text" name="site_tagline" class="form-control" value="{{ $settings['general']['site_tagline'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Site Description</label>
                                        <textarea name="site_description" class="form-control" rows="2">{{ $settings['general']['site_description'] ?? '' }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Logo for Dark Backgrounds (e.g. hero, sidebar)</label>
                                        <small class="text-muted d-block mb-2">Upload the light/white version of your logo. Used on dark or transparent backgrounds.</small>
                                        <input type="file" name="site_dark_logo" class="form-control" accept="image/png,image/jpeg,image/svg+xml,image/webp">
                                        @if($settings['general']['site_dark_logo'] ?? false)
                                        <div class="mt-2 p-3" style="background:#1a1a2e; border-radius:8px; display:inline-block;">
                                            <img src="{{ asset('storage/' . $settings['general']['site_dark_logo']) }}" height="50" alt="Dark bg logo">
                                            <label class="ms-2 text-white"><input type="checkbox" name="remove_site_dark_logo" value="1"> Remove</label>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Logo for Light Backgrounds (e.g. scrolled navbar)</label>
                                        <small class="text-muted d-block mb-2">Upload the dark version of your logo. Used on white/light backgrounds.</small>
                                        <input type="file" name="site_light_logo" class="form-control" accept="image/png,image/jpeg,image/svg+xml,image/webp">
                                        @if($settings['general']['site_light_logo'] ?? false)
                                        <div class="mt-2 p-3" style="background:#f0f0f0; border-radius:8px; display:inline-block;">
                                            <img src="{{ asset('storage/' . $settings['general']['site_light_logo']) }}" height="50" alt="Light bg logo">
                                            <label class="ms-2"><input type="checkbox" name="remove_site_light_logo" value="1"> Remove</label>
                                        </div>
                                        @endif
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Site Favicon</label>
                                        <input type="file" name="site_favicon" class="form-control" accept="image/png,image/x-icon,image/svg+xml">
                                        <small class="text-muted">Upload favicon (PNG, ICO, SVG). Will replace existing favicon.</small>
                                        @if($settings['general']['site_favicon'] ?? false)
                                        <div class="mt-2">
                                            <img src="{{ asset('storage/' . $settings['general']['site_favicon']) }}" height="32" alt="Current favicon">
                                            <label class="ms-2"><input type="checkbox" name="remove_site_favicon" value="1"> Remove favicon</label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save General Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Contact -->
                    <div class="tab-pane fade" id="contact" role="tabpanel">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">Contact Settings</h3></div>
                            <form action="{{ route('admin.settings.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Contact Email</label>
                                        <input type="email" name="contact_email" class="form-control" value="{{ $settings['contact']['contact_email'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contact Phone</label>
                                        <input type="text" name="contact_phone" class="form-control" value="{{ $settings['contact']['contact_phone'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Contact Address</label>
                                        <textarea name="contact_address" class="form-control" rows="2">{{ $settings['contact']['contact_address'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save Contact Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="tab-pane fade" id="email" role="tabpanel">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">Email Settings</h3></div>
                            <form action="{{ route('admin.settings.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Mail Mailer</label>
                                        <select name="mail_mailer" class="form-select">
                                            <option value="smtp" {{ ($settings['email']['mail_mailer'] ?? '') == 'smtp' ? 'selected' : '' }}>SMTP</option>
                                            <option value="sendmail" {{ ($settings['email']['mail_mailer'] ?? '') == 'sendmail' ? 'selected' : '' }}>Sendmail</option>
                                            <option value="mailgun" {{ ($settings['email']['mail_mailer'] ?? '') == 'mailgun' ? 'selected' : '' }}>Mailgun</option>
                                            <option value="log" {{ ($settings['email']['mail_mailer'] ?? '') == 'log' ? 'selected' : '' }}>Log</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mail Host</label>
                                        <input type="text" name="mail_host" class="form-control" value="{{ $settings['email']['mail_host'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mail Port</label>
                                        <input type="number" name="mail_port" class="form-control" value="{{ $settings['email']['mail_port'] ?? '587' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mail Username</label>
                                        <input type="text" name="mail_username" class="form-control" value="{{ $settings['email']['mail_username'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mail Password</label>
                                        <input type="password" name="mail_password" class="form-control" value="{{ $settings['email']['mail_password'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Mail Encryption</label>
                                        <select name="mail_encryption" class="form-select">
                                            <option value="">None</option>
                                            <option value="tls" {{ ($settings['email']['mail_encryption'] ?? '') == 'tls' ? 'selected' : '' }}>TLS</option>
                                            <option value="ssl" {{ ($settings['email']['mail_encryption'] ?? '') == 'ssl' ? 'selected' : '' }}>SSL</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">From Address</label>
                                        <input type="email" name="mail_from_address" class="form-control" value="{{ $settings['email']['mail_from_address'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">From Name</label>
                                        <input type="text" name="mail_from_name" class="form-control" value="{{ $settings['email']['mail_from_name'] ?? '' }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save Email Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- SEO -->
                    <div class="tab-pane fade" id="seo" role="tabpanel">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">SEO Settings</h3></div>
                            <form action="{{ route('admin.settings.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    @foreach($settings['seo'] ?? [] as $key => $value)
                                    <div class="mb-3">
                                        <label class="form-label">{{ ucwords(str_replace(['seo_', '_'], ['', ' '], $key)) }}</label>
                                        @if(str_contains($key, 'description'))
                                        <textarea name="{{ $key }}" class="form-control" rows="2">{{ $value }}</textarea>
                                        @else
                                        <input type="text" name="{{ $key }}" class="form-control" value="{{ $value }}">
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save SEO Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Integrations -->
                    <div class="tab-pane fade" id="integrations" role="tabpanel">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">Integration Settings</h3></div>
                            <form action="{{ route('admin.settings.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Google Analytics ID</label>
                                        <input type="text" name="google_analytics_id" class="form-control" value="{{ $settings['integrations']['google_analytics_id'] ?? '' }}" placeholder="G-XXXXXXXXXX">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Google Tag Manager ID</label>
                                        <input type="text" name="google_tag_manager_id" class="form-control" value="{{ $settings['integrations']['google_tag_manager_id'] ?? '' }}" placeholder="GTM-XXXXXXX">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="analytics_enabled" class="form-check-input" value="1" {{ isset($settings['integrations']['analytics_enabled']) && $settings['integrations']['analytics_enabled'] ? 'checked' : '' }}>
                                            <label class="form-check-label">Enable Google Analytics</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <label class="form-label">reCAPTCHA Site Key</label>
                                        <input type="text" name="recaptcha_site_key" class="form-control" value="{{ $settings['integrations']['recaptcha_site_key'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">reCAPTCHA Secret Key</label>
                                        <input type="text" name="recaptcha_secret_key" class="form-control" value="{{ $settings['integrations']['recaptcha_secret_key'] ?? '' }}">
                                    </div>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="recaptcha_enabled" class="form-check-input" value="1" {{ isset($settings['integrations']['recaptcha_enabled']) && $settings['integrations']['recaptcha_enabled'] ? 'checked' : '' }}>
                                            <label class="form-check-label">Enable reCAPTCHA</label>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" name="live_chat_enabled" class="form-check-input" value="1" {{ isset($settings['integrations']['live_chat_enabled']) && $settings['integrations']['live_chat_enabled'] ? 'checked' : '' }}>
                                            <label class="form-check-label">Enable Live Chat</label>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Live Chat Script</label>
                                        <textarea name="live_chat_script" class="form-control" rows="4">{{ $settings['integrations']['live_chat_script'] ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save Integration Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Social -->
                    <div class="tab-pane fade" id="social" role="tabpanel">
                        <div class="card">
                            <div class="card-header"><h3 class="card-title">Social Media Settings</h3></div>
                            <form action="{{ route('admin.settings.update') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="mb-3">
                                        <label class="form-label">Facebook URL</label>
                                        <input type="url" name="social_facebook" class="form-control" value="{{ $settings['social']['social_facebook'] ?? '' }}" placeholder="https://facebook.com/...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Twitter URL</label>
                                        <input type="url" name="social_twitter" class="form-control" value="{{ $settings['social']['social_twitter'] ?? '' }}" placeholder="https://twitter.com/...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">LinkedIn URL</label>
                                        <input type="url" name="social_linkedin" class="form-control" value="{{ $settings['social']['social_linkedin'] ?? '' }}" placeholder="https://linkedin.com/...">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Instagram URL</label>
                                        <input type="url" name="social_instagram" class="form-control" value="{{ $settings['social']['social_instagram'] ?? '' }}" placeholder="https://instagram.com/...">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Save Social Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    // Activate tab based on hash
    var hash = window.location.hash;
    if (hash) {
        var tab = document.querySelector('[data-bs-target="' + hash + '"]');
        if (tab) { tab.click(); }
    }
    // Update hash on tab click
    document.querySelectorAll('[data-bs-toggle="pill"]').forEach(function(el) {
        el.addEventListener('shown.bs.tab', function(e) {
            history.replaceState(null, null, e.target.getAttribute('data-bs-target'));
        });
    });
</script>
@endpush
@endsection
