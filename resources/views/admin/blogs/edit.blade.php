@extends('adminlte::page')

@section('title', 'Edit Blog')

@section('content_header')
    <h1 class="text-primary fw-bold">🛠️ Edit Blog</h1>
@stop

@section('content')
    <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            {{-- Left Side --}}
            <div class="col-md-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Blog Details</h5>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label text-muted">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $blog->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $blog->slug }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ $blog->short_description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Content</label>
                            <textarea id="summernote" name="content" class="form-control" rows="5" required>{{ $blog->content }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Feature Image</label>
                            <input type="file" name="image" class="form-control">
                            @if($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" class="mt-2" width="120" alt="Feature Image">
                            @endif
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-control" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label text-muted">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" @if($blog->status) selected @endif>Active</option>
                                <option value="0" @if(!$blog->status) selected @endif>Inactive</option>
                            </select>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Right Side (SEO Section) --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">SEO Settings</h5>
                    </div>
                    <div class="card-body">
                        @foreach([
                            'seo_title' => 'SEO Title',
                            'seo_description' => 'SEO Description',
                            'seo_keywords' => 'SEO Keywords',
                            'og_title' => 'OG Title',
                            'og_description' => 'OG Description',
                            'twitter_title' => 'Twitter Title',
                            'twitter_description' => 'Twitter Description',
                        ] as $field => $label)
                            <div class="mb-3">
                                <label class="form-label text-muted">{{ $label }}</label>
                                @if(str_contains($field, 'description'))
                                    <textarea name="{{ $field }}" class="form-control" rows="2">{{ optional($blog->seoMeta)->$field }}</textarea>
                                @else
                                    <input type="text" name="{{ $field }}" class="form-control" value="{{ optional($blog->seoMeta)->$field }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update Blog</button>
            <a href="{{ route('blogs.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
        </div>
    </form>
@stop

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
    <style>
        body.dark-mode .card {
            background-color: #2e3440 !important;
            border-color: #4c566a !important;
        }
        body.dark-mode .form-control {
            background-color: #3b4252 !important;
            color: #e5e9f0 !important;
            border-color: #4c566a !important;
        }
        body.dark-mode label {
            color: #e5e9f0;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview']]
                ]
            });
        });
    </script>
@endpush
