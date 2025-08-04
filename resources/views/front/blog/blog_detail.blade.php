{{-- filepath: resources/views/front/blog/blog_detail.blade.php --}}
@extends('front.layouts.app')

@section('content')
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">News details</span>
          <h1 class="text-capitalize mb-4 text-lg">{{ $blog->title }}</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">News details</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 mb-5">
                        <div class="single-blog-item">
                            <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/blog/default.jpg') }}" alt="{{ $blog->title }}" class="img-fluid rounded">

                            <div class="blog-item-content bg-white p-5">
                                <div class="blog-item-meta bg-gray py-1 px-2">
                                    <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>{{ $blog->category->name ?? 'Blog' }}</span>
                                    <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{ $blog->created_at->format('jS F, Y') }}</span>
                                </div> 

                                <h2 class="mt-3 mb-4">{{ $blog->title }}</h2>
                                <p class="lead mb-4">{!! $blog->short_description !!}</p>

                                <div>{!! $blog->content !!}</div>

                                {{-- Tags and share section (optional, dynamic if you have tags) --}}
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                @include('front.blog.sidebar')
            </div>   
        </div>
    </div>
</section>
@endsection