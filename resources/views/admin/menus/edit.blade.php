@extends('adminlte::page')

@section('title', 'Edit Menu')

@section('content_header')
    <h1 class="text-primary">Edit Menu</h1>
@stop

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('admin.menus.partials.form', ['menu' => $menu])
    </form>
@stop
