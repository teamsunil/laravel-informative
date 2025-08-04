@extends('adminlte::page')

@section('title', 'Site Settings')

@section('content_header')
    <h1><i class="fas fa-cogs text-primary"></i> Site Settings</h1>
@stop

@section('content')
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card {{ session('adminlte_dark_mode') ? 'bg-dark text-light border-secondary' : '' }} shadow-sm">
        <div class="card-header {{ session('adminlte_dark_mode') ? 'bg-info text-dark' : 'bg-primary text-white' }}">
            <h3 class="card-title">Site Configuration</h3>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    {{-- Left Column --}}
                    <div class="col-md-6">
                        @foreach([
                            'site_name' => 'Site Name',
                            'tagline' => 'Tagline',
                            'site_email' => 'Email',
                            'site_phone' => 'Phone',
                        ] as $key => $label)
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label">{{ $label }}</label>
                                <input type="text" id="{{ $key }}" name="{{ $key }}"
                                       class="form-control bg-light border-secondary"
                                       value="{{ $settings[$key] ?? '' }}">
                            </div>
                        @endforeach

                        <div class="mb-3">
                            <label for="site_address" class="form-label">Address</label>
                            <textarea class="form-control bg-light border-secondary" id="site_address" name="site_address" rows="3">{{ $settings['site_address'] ?? '' }}</textarea>
                        </div>

                        @foreach([
                            'facebook_url' => 'Facebook URL',
                            'twitter_url' => 'Twitter URL',
                            'instagram_url' => 'Instagram URL',
                            'footer_text' => 'Footer Text',
                            'working_hours' => 'Working Hours'
                        ] as $key => $label)
                            <div class="mb-3">
                                <label for="{{ $key }}" class="form-label">{{ $label }}</label>
                                <input type="text" class="form-control bg-light border-secondary" id="{{ $key }}" name="{{ $key }}"
                                       value="{{ $settings[$key] ?? '' }}">
                            </div>
                        @endforeach
                    </div>

                    {{-- Right Column --}}
                    <div class="col-md-6">
                        @foreach([
                            'logo' => ['label' => 'Logo', 'height' => 50],
                            'favicon' => ['label' => 'Favicon', 'height' => 30],
                            'hero_background_url' => ['label' => 'Hero Background Image', 'height' => 60],
                            'about_image' => ['label' => 'About Section Image', 'height' => 60],
                        ] as $key => $data)
                            <div class="mb-3">
                                <label class="form-label">{{ $data['label'] }}</label><br>
                                @if (!empty($settings[$key]))
                                    <img src="{{ asset('storage/' . $settings[$key]) }}" alt="{{ $key }}"
                                         height="{{ $data['height'] }}" class="mb-2 d-block">
                                @endif
                                <input type="file" class="form-control-file" name="{{ $key }}">
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success mt-3">
                        <i class="fas fa-save me-1"></i> Save Settings
                    </button>
                </div>
            </form>
        </div>
    </div>
@stop
