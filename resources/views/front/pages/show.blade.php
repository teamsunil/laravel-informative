@extends('front.layouts.app')

@section('title', $page->title)

@section('content')
       <div class="main-wrapper ">
        <section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">{{$page->title}}</span>
          <h1 class="text-capitalize mb-4 text-lg">{{$page->short_description}}</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">{{$page->title}}</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>


 <section class="page-content ">{!! $page->content !!}</section>
    </div>

@endsection
