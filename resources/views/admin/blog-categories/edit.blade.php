@extends('adminlte::page')

@section('title', 'Edit Blog Category')

@section('content_header')
    <h1>✏️ Edit Blog Category</h1>
@stop

@section('content')
    <form action="{{ route('blog-categories.update', $blog_category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{ old('name', $blog_category->name) }}" class="form-control" required>
            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $blog_category->slug) }}" class="form-control">
            <small class="text-muted"></small>
            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea name="description" class="form-control" rows="3">{{ old('description', $blog_category->description) }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ old('status', $blog_category->status) == '1' ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('status', $blog_category->status) == '0' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update Category</button>
        <a href="{{ route('blog-categories.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@stop
