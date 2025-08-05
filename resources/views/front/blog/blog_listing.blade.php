@extends('front.layouts.app')

@section('content')
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our blog</span>
          <h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section blog-wrap bg-gray">
    <div class="container">
        <div class="row">
            @foreach($blogs as $blog)
                <div class="col-lg-6 col-md-6 mb-5">
                    <div class="blog-item">
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('images/blog/default.jpg') }}" alt="{{ $blog->title }}" class="img-fluid rounded">

                        <div class="blog-item-content bg-white p-5">
                            <div class="blog-item-meta bg-gray py-1 px-2">

                              {{-- @dd($blog->category) --}}
                                <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>{{ $blog->category->name ?? 'Blog' }}</span>
                                <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{ $blog->created_at->format('jS F, Y') }}</span>
                            </div> 

                            <h3 class="mt-3 mb-3">
                                <a href="{{ route('blogs.detail', $blog->slug) }}">{{ $blog->title }}</a>
                            </h3>
                            <p class="mb-4">{{ $blog->short_description }}</p>

                            <a href="{{ route('blogs.detail', $blog->slug) }}" class="btn btn-small btn-main btn-round-full">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        
    </div>
</section>
@endsection