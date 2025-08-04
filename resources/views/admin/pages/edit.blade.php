@extends('adminlte::page')

@section('title', 'Edit Page')

@section('content_header')
    <h1 class="text-primary fw-bold">🛠️ Edit Page</h1>
@stop

@section('content')
    <form action="{{ route('pages.update', $page) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            {{-- Left Side --}}
            <div class="col-md-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0">Page Details</h5>
                    </div>
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label text-muted">Title</label>
                            <input type="text" name="title" class="form-control" value="{{ $page->title }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $page->slug }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Content</label>
                            <textarea id="summernote" name="content" class="form-control" rows="5" required>{{ $page->content }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ $page->short_description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label text-muted">Banner Image</label>
                            <input type="file" name="image" class="form-control">
                            @if($page->image)
                                <img src="{{ asset('storage/' . $page->image) }}" class="mt-2" width="120" alt="Feature Image">
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Status</label>
                                <select name="status" class="form-control">
                                    <option value="1" @if($page->status) selected @endif>Active</option>
                                    <option value="0" @if(!$page->status) selected @endif>Inactive</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Template</label>
                                <select name="template" class="form-control">
                                    <option value="home" @if($page->template == 'home') selected @endif>Home Page</option>
                                    <option value="common" @if($page->template == 'common') selected @endif>Common Page</option>
                                </select>
                            </div>
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
                                    <textarea name="{{ $field }}" class="form-control" rows="2">{{ optional($page->seoMeta)->$field }}</textarea>
                                @else
                                    <input type="text" name="{{ $field }}" class="form-control" value="{{ optional($page->seoMeta)->$field }}">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update</button>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
        </div>
    </form>
@stop

@push('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">
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
@push('css')
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
