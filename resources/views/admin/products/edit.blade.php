@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1 class="text-primary fw-bold">🛒 Edit Product</h1>
@stop

@section('content')
    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')

        <div class="row">
            {{-- Left Side --}}
            <div class="col-md-8 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Product Information</h5>
                    </div>
                    <div class="card-body">

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Slug --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Slug</label>
                            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug', $product->slug) }}" required>
                            @error('slug')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- SKU --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">SKU</label>
                            <input type="text" name="sku" class="form-control @error('sku') is-invalid @enderror" value="{{ old('sku', $product->sku) }}">
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Type --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Type</label>
                            <select name="type" class="form-control @error('type') is-invalid @enderror">
                                <option value="simple" {{ $product->type == 'simple' ? 'selected' : '' }}>Simple</option>
                                <option value="variable" {{ $product->type == 'variable' ? 'selected' : '' }}>Variable</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Price --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Price</label>
                            <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Regular Price --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Regular Price</label>
                            <input type="text" name="regular_price" class="form-control @error('regular_price') is-invalid @enderror" value="{{ old('regular_price', $product->regular_price) }}">
                            @error('regular_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Sale Price --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Sale Price</label>
                            <input type="text" name="sale_price" class="form-control @error('sale_price') is-invalid @enderror" value="{{ old('sale_price', $product->sale_price) }}">
                            @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Short Description</label>
                            <textarea name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Description --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Description</label>
                            <textarea id="summernote" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Product Image --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Product Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" width="100" class="mt-2">
                            @endif
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Gallery --}}
                        {{-- <div class="mb-3">
                            <label class="form-label text-muted">Gallery (Multiple Images)</label>
                            <input type="file" name="gallery[]" class="form-control @error('gallery') is-invalid @enderror" multiple>
                            @if($product->gallery)
                                @foreach(json_decode($product->gallery, true) as $galleryImg)
                                    <img src="{{ asset('storage/' . $galleryImg) }}" width="80" class="mt-2 mr-2">
                                @endforeach
                            @endif
                            @error('gallery')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            @error('gallery.*')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div> --}}

                        {{-- Status and Stock --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Status</label>
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="1" {{ $product->status ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ !$product->status ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label text-muted">Stock Status</label>
                                <select name="stock_status" class="form-control @error('stock_status') is-invalid @enderror">
                                    <option value="instock" {{ $product->stock_status == 'instock' ? 'selected' : '' }}>In Stock</option>
                                    <option value="outofstock" {{ $product->stock_status == 'outofstock' ? 'selected' : '' }}>Out of Stock</option>
                                </select>
                                @error('stock_status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Right Side --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Product Meta Information</h5>
                    </div>
                    <div class="card-body">
                        {{-- Brand --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Brand</label>
                            <input type="text" name="brand" class="form-control @error('brand') is-invalid @enderror" value="{{ old('brand', $product->brand) }}">
                            @error('brand')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Product Code --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Product Code</label>
                            <input type="text" name="product_code" class="form-control @error('product_code') is-invalid @enderror" value="{{ old('product_code', $product->product_code) }}">
                            @error('product_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Preorder Text --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Preorder Text</label>
                            <input type="text" name="preorder_text" class="form-control @error('preorder_text') is-invalid @enderror" value="{{ old('preorder_text', $product->preorder_text) }}">
                            @error('preorder_text')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Free Delivery --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Free Delivery</label>
                            <select name="free_delivery" class="form-control @error('free_delivery') is-invalid @enderror">
                                <option value="1" {{ $product->free_delivery ? 'selected' : '' }}>Yes</option>
                                <option value="0" {{ !$product->free_delivery ? 'selected' : '' }}>No</option>
                            </select>
                            @error('free_delivery')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Categories --}}
                        <div class="mb-3">
                            <label class="form-label text-muted">Categories</label>
                            <input type="text" name="categories" class="form-control @error('categories') is-invalid @enderror" value="{{ old('categories', $product->categories) }}">
                            @error('categories')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save me-1"></i> Update Product</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left me-1"></i> Cancel</a>
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
