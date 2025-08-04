{{-- filepath: resources/views/admin/pages/show.blade.php --}}
@extends('adminlte::page')

@section('title', 'Page Details')

@section('content_header')
    <h1>Page Details</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>{{ $page->title }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Status:</strong> {{ $page->status ? 'Active' : 'Inactive' }}</p>
            <p><strong>Content:</strong></p>
            <div>{!! nl2br(e($page->content)) !!}</div>
        </div>
        <div class="card-footer">
            <a href="{{ route('pages.edit', $page) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('pages.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@stop