@extends('front.layouts.app')

{{-- @section('title', $page->title) --}}

@section('content')
<div class="main-wrapper" style="position: relative;">
    <img src="{{ asset('storage/' . $homeSection->banner_image) }}" alt="Banner Image" style="width: 100%; height: auto;">

    <div style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 100%;
        text-align: left;
        color: white;
        padding: 0 15px;
    ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9 col-md-10">
                    <div class="block">
                            <span class="d-block mb-3 text-white text-capitalize">{{ $homeSection->title }}</span>
                            <h1 class="animated fadeInUp mb-5">{{ $homeSection->sub_title }}</h1>
                            <a href="#" target="_blank" class="btn btn-main animated fadeInUp btn-round-full">{{ $homeSection->cta }}<i class="btn-icon fa fa-angle-right ml-2"></i></a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

        <!-- Section Intro Start -->

        {!!$homeSection->latest_news!!}

        {{-- <section class="section intro">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8">
                        <div class="section-title">
                            <span class="h6 text-color ">We are creative & expert people</span>
                            <h2 class="mt-3 content-title">We work with business & provide solution to client with their
                                business problem </h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="intro-item mb-5 mb-lg-0">
                            <i class="ti-desktop color-one"></i>
                            <h4 class="mt-4 mb-3">Modern & Responsive design</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="intro-item mb-5 mb-lg-0">
                            <i class="ti-medall color-one"></i>
                            <h4 class="mt-4 mb-3">Awarded licensed company</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="intro-item">
                            <i class="ti-layers-alt color-one"></i>
                            <h4 class="mt-4 mb-3">Build your website Professionally</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit, ducimus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <!-- Section Intro END -->
        <!-- Section About Start -->

        <section class="section about position-relative">
            <div class="bg-about"><img src="{{ asset('storage/' . $homeSection->about_section_image) }}" alt="About Section Image" class="img-fluid w-100"></div>
            {{-- <img src="{{ asset('storage/' . $homeSection->about_section_image) }}" alt="About Section Image" class="img-fluid w-100"> --}}
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-6 offset-md-0">
                        <div class="about-item ">
                            {{-- <span class="h6 text-color">{{$homeSection->about_section_heading}}</span>
                            <h2 class="mt-3 mb-4 position-relative content-title">We are dynamic team of creative people
                            </h2> --}}
                            {{-- <div class="about-content">
                                <h4 class="mb-3 position-relative">We are Perfect Solution</h4>
                                <p class="mb-5">We provide consulting services in the area of IFRS and management
                                    reporting, helping companies to reach their highest level. We optimize business
                                    processes, making them easier.</p>

                                <a href="#" class="btn btn-main btn-round-full">{{$homeSection->title}}</a>
                            </div> --}}

                            {!! $homeSection->about_section_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Section About End -->
        <!-- section Counter Start -->
        <section class="section counter">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item text-center mb-5 mb-lg-0">
                            <h3 class="mb-0"><span class="counter-stat font-weight-bold">1730</span> +</h3>
                            <p class="text-muted">Project Done</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item text-center mb-5 mb-lg-0">
                            <h3 class="mb-0"><span class="counter-stat font-weight-bold">125 </span>M </h3>
                            <p class="text-muted">User Worldwide</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item text-center mb-5 mb-lg-0">
                            <h3 class="mb-0"><span class="counter-stat font-weight-bold">39</span></h3>
                            <p class="text-muted">Availble Country</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter-item text-center">
                            <h3 class="mb-0"><span class="counter-stat font-weight-bold">14</span></h3>
                            <p class="text-muted">Award Winner </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section Counter End  -->
        <!--  Section Services Start -->
       <section class="section service border-top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Our Services</span>
                    <h2 class="mt-3 content-title">We provide a wide range of creative services</h2>
                </div>
            </div>
        </div>
  
         {{-- @dd($homeSection); --}}

        <div class="row justify-content-center">
        @foreach(json_decode($homeSection->services_lists) as $serviceHtml)
            {!! $serviceHtml !!}
        @endforeach
</div>
    </div>
</section>
        <!--  Section Services End -->
        <!-- Section Cta Start -->
        <section class="section cta">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="cta-item  bg-white p-5 rounded">
                            <span class="h6 text-color">We create for you</span>
                            <h2 class="mt-2 mb-4">Entrust Your Project to Our Best Team of Professionals</h2>
                            <p class="lead mb-4">Have any project on mind? For immidiate support :</p>
                            <h3><i class="ti-mobile mr-3 text-color"></i>+23 876 65 455</h3>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--  Section Cta End-->
        <!-- Section Testimonial Start -->
<section class="section testimonial">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 ">
                <div class="section-title">
                    <span class="h6 text-color">Clients testimonial</span>
                    <h2 class="mt-3 content-title">Check what's our clients say about us</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row testimonial-wrap">
            @foreach(json_decode($homeSection->testimonial_lists, true) as $testimonial)
                {!! $testimonial !!}
            @endforeach
        </div>
    </div>
</section>
        <!-- Section Testimonial End -->
        <section class="section latest-blog bg-2">
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title">
                    <span class="h6 text-color">Latest News</span>
                    <h2 class="mt-3 content-title text-white">Latest articles to enrich knowledge</h2>
                </div>
            </div>
        </div> --}}

        <div class="row justify-content-center">
            {!! $homeSection->latest_news !!}
        </div>
    </div>
</section>

        <section class="mt-70 position-relative">
            <div class="container">
                <div class="cta-block-2 bg-gray p-5 rounded border-1">
                    <div class="row justify-content-center align-items-center ">
                        <div class="col-lg-7">
                            <span class="text-color">For Every type business</span>
                            <h2 class="mt-2 mb-4 mb-lg-0">Entrust Your Project to Our Best Team of Professionals</h2>
                        </div>
                        <div class="col-lg-4">
                            <a href={{ route('contact.show') }} class="btn btn-main btn-round-full float-lg-right ">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>

@endsection
