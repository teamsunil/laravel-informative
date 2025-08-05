@extends('front.layouts.app')

@section('title', $product->name)

@section('content')
<!-- Product Detail Banner -->
<section class="page-title bg-1">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 text-center">
                <div class="page-title-content">
                    <h1 class="text-white mb-3">{{ $product->name }}</h1>
                    <p class="text-white">{{ $product->short_description }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Details -->
<section class="section product-details">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid rounded shadow">
            </div>
            <div class="col-lg-6">
                <h2 class="mb-3">{{ $product->name }}</h2>
                @if($product->on_sale)
                    <h4 class="text-danger">£{{ $product->sale_price }} <del class="text-muted fs-6">£{{ $product->regular_price }}</del></h4>
                @else
                    <h4 class="text-primary">£{{ $product->price }}</h4>
                @endif

                <p class="mt-3">{{ $product->description }}</p>

                <ul class="list-unstyled mt-4">
                    <li><strong>SKU:</strong> {{ $product->sku }}</li>
                    <li><strong>Type:</strong> {{ ucfirst($product->type) }}</li>
                    <li><strong>Brand:</strong> {{ $product->brand }}</li>
                    <li><strong>Stock Status:</strong> 
                        @if($product->stock_status === 'instock')
                            <span class="text-success">In Stock</span>
                        @else
                            <span class="text-danger">Out of Stock</span>
                        @endif
                    </li>
                    @if($product->free_delivery)
                        <li><span class="badge bg-success">Free Delivery</span></li>
                    @endif
                </ul>

                <a href="{{ route('contact.show') }}" class="btn btn-main btn-round-full mt-4">Enquire Now <i class="fa fa-angle-right ml-2"></i></a>
            </div>
        </div>

    </div>
</section>
@endsection
