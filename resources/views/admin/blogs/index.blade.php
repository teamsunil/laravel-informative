@extends('adminlte::page')

@section('title', 'Manage Blogs')

@section('content_header')
    <div class="d-flex justify-content-between align-items-center mb-2">
        <div>
            <h1 class="h3 text-primary">
                <i class="fas fa-newspaper"></i> Manage Blogs
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blogs</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('blogs.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Add New Blog
        </a>
    </div>
@stop

@section('content')
    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Blogs</h5>

               <form action="{{ route('blogs.index') }}" method="GET" class="d-flex align-items-center" style="max-width: 400px; width: 100%;">
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
                            <th>Created At</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($blogs as $blog)
                            <tr>
                                <td>{{ $blog->id }}</td>
                                <td class="fw-bold">{{ $blog->title }}</td>
                                <td class="text-muted">{{ $blog->slug }}</td>
                                <td>
                                    @if($blog->status)
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Active</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Inactive</span>
                                    @endif
                                </td>
                                <td>{{ $blog->created_at->format('d M, Y') }}</td>
                                <td class="text-end">
                                    <a href="{{ route('blogs.edit', $blog) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this blog?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No blogs found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($blogs, 'links'))
            <div class="card-footer">
                {{ $blogs->links() }}
            </div>
        @endif
    </div>
@stop
