@extends('adminlte::page')

@section('title', 'Manage Products')
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
                <i class="fas fa-box-open"></i> Manage Products
            </h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent px-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
        <a href="{{ route('admin.products.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Add New Product
        </a>
    </div>
@stop

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">All Products</h5>
            <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex align-items-center" style="max-width: 400px; width: 100%;">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control border-primary" placeholder="Search Products..." value="{{ request('search') }}">
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
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $loop->iteration + ($products->currentPage() - 1) * $products->perPage() }}</td>
                                <td class="fw-bold">{{ $product->name }}</td>
                                <td class="text-muted">{{ $product->slug }}</td>
                                <td>{{ number_format($product->price, 2) }}</td>
                                <td>
                                    @if($product->status)
                                        <span class="badge bg-success"><i class="fas fa-check-circle"></i> Active</span>
                                    @else
                                        <span class="badge bg-danger"><i class="fas fa-times-circle"></i> Inactive</span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-4">No products found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($products, 'links'))
            <div class="card-footer">
                {{ $products->links() }}
            </div>
        @endif
    </div>
@stop
