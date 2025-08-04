@extends('adminlte::page')

@section('title', 'Add New Menu')

@section('content_header')
    <h1 class="text-primary">Add New Menu</h1>
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

    <form action="{{ route('menus.store') }}" method="POST">
        @csrf
        @include('admin.menus.partials.form', ['menu' => null])
    </form>
@stop
