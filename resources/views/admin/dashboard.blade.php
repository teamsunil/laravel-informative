@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center">
        <div>
            <h1 class="h3 fw-bold text-primary">📊 Admin Dashboard</h1>
            <p class="text-muted">Overview of your software site activity</p>
        </div>
    </div>
@stop

@section('content')
<div class="row">
    {{-- Stat Cards --}}
    @foreach([
        ['count' => $totalPages, 'label' => 'Pages', 'icon' => 'file-alt', 'color' => 'info'],
        ['count' => $totalBlogs, 'label' => 'Blogs', 'icon' => 'newspaper', 'color' => 'success'],
        ['count' => $totalUsers, 'label' => 'Users', 'icon' => 'users', 'color' => 'primary'],
        ['count' => $totalContacts, 'label' => 'Contacts', 'icon' => 'envelope', 'color' => 'warning'],
    ] as $item)
        <div class="col-md-3 col-6">
            <div class="small-box bg-{{ $item['color'] }}">
                <div class="inner">
                    <h3>{{ $item['count'] }}</h3>
                    <p>{{ $item['label'] }}</p>
                </div>
                <div class="icon">
                    <i class="fas fa-{{ $item['icon'] }}"></i>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="row">
    {{-- Chart 1 --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-light">
                🗓️ Blogs Created per Month
            </div>
            <div class="card-body">
                <canvas id="blogLineChart" height="200"></canvas>
            </div>
        </div>
    </div>

    {{-- Chart 2 --}}
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header fw-bold bg-light">
                📄 Page Status Breakdown
            </div>
            <div class="card-body">
                <canvas id="pagePieChart" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

{{-- Recent Blogs --}}
<div class="card shadow-sm mt-4">
    <div class="card-header bg-light fw-bold">📝 Recent Blogs</div>
    <div class="card-body">
        @forelse($latestBlogs as $blog)
            <div class="d-flex justify-content-between border-bottom py-2">
                <div>
                    <i class="fas fa-circle text-success me-1"></i> {{ $blog->title }}
                </div>
                <small class="text-muted">{{ $blog->created_at->format('d M Y') }}</small>
            </div>
        @empty
            <div class="text-muted text-center">No blog posts yet.</div>
        @endforelse
    </div>
</div>
@stop

@push('css')
<style>
    body.dark-mode .card {
        background-color: #2e3440 !important;
        border-color: #4c566a !important;
    }
    body.dark-mode .card-header {
        background-color: #3b4252 !important;
    }
</style>
@endpush

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    new Chart(document.getElementById('blogLineChart'), {
        type: 'line',
        data: {
            labels: @json(array_keys($blogMonthlyCounts)),
            datasets: [{
                label: 'Blogs',
                data: @json(array_values($blogMonthlyCounts)),
                borderColor: '#3b82f6',
                backgroundColor: 'rgba(59,130,246,0.1)',
                tension: 0.3
            }]
        },
        options: {
            responsive: true,
            scales: { y: { beginAtZero: true } }
        }
    });

    new Chart(document.getElementById('pagePieChart'), {
        type: 'pie',
        data: {
            labels: ['Active', 'Inactive'],
            datasets: [{
                data: @json([$activePages, $inactivePages]),
                backgroundColor: ['#10b981', '#ef4444']
            }]
        }
    });
</script>
@endpush
