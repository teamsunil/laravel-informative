@extends('front.layouts.app')

@section('content')
<section class="page-title bg-1">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">Our Products</span>
          <h1 class="text-capitalize mb-4 text-lg">Product Catalog</h1>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="{{ url('/') }}" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">Products</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section product-wrap bg-gray">
    <div class="container">
        <div class="row">
            @forelse($products as $product)
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="product-item bg-white">
                        <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/product/default.jpg') }}" alt="{{ $product->name }}" class="img-fluid rounded">

                        <div class="product-item-content bg-white p-5">
                            <div class="product-item-meta bg-gray py-1 px-2 mb-2">
                                <span class="text-muted text-capitalize mr-3"><i class="ti-package mr-2"></i>Product</span>
                                <span class="text-black text-capitalize mr-3">£ {{ number_format($product->price, 2) }}</span>
                            </div> 

                            <h3 class="mt-3 mb-3">
                                <a href="{{ route('products.show', $product->slug) }}">{{ $product->name }}</a>
                            </h3>
                            <p class="mb-4">{{ Str::limit($product->short_description, 120) }}</p>

                            <a href="{{ route('products.show', $product->slug) }}" class="btn btn-small btn-main btn-round-full">View Details</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>No products found.</p>
                </div>
            @endforelse
        </div>

        <div class="pagination justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
