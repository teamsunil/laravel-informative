{{-- resources/views/admin/pages/index.blade.php --}}
@extends('adminlte::page')

@section('title', 'Manage Pages')

<style>
    .input-group .form-control {
    border-right: 0;
    box-shadow: none !important;
}

.input-group .form-control:focus {
    border-color: #0d6efd;
    outline: none;
}

.input-group .btn {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    box-shadow: none !important;
}
    </style>

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h1 class="h3 text-primary">
                <i class="fas fa-file-alt"></i> Manage Pages
            </h1>




 









            <nav aria-label="breadcrumb">

                    
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pages</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('pages.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Add New Page
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Pages</h5>
               <form action="{{ route('pages.index') }}" method="GET" class="d-flex align-items-center" style="max-width: 400px; width: 100%;">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control border-primary" placeholder="Search pages..." value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Slug</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pages as $page)
                            <tr>
                                <td>{{ $page->id }}</td>
                                <td class="fw-bold">{{ $page->title }}</td>
                                <td class="text-muted">{{ $page->slug }}</td>
                                <td>
                                    @if($page->status)
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Active</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('pages.edit', $page) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('pages.destroy', $page) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this page?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">No pages found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($pages, 'links'))
            <div class="card-footer">
                {{ $pages->links() }}
            </div>
        @endif
    </div>
@stop
