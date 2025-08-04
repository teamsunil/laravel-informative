@extends('adminlte::page')

@section('title', 'Blog Categories')

@section('content_header')
    <h1>🗂 Blog Categories</h1>
@stop

@section('content')
    <a href="{{ route('blog-categories.create') }}" class="btn btn-primary mb-3">+ Add Category</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th width="150">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        <span class="badge {{ $category->status ? 'bg-success' : 'bg-danger' }}">
                            {{ $category->status ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('blog-categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('blog-categories.destroy', $category->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this category?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">No Categories Found</td></tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-3">
        {{ $categories->links() }}
    </div>
@stop
